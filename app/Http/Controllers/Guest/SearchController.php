<?php

namespace App\Http\Controllers\Guest;

use App\Models\Apartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class SearchController extends Controller
{

    public function search(Request $request)
    {

        $apartments = Apartment::all();

         // Ottengo i dati dal form
        $address = $request->input('address');
        $distance = $request->input('distance', 20);
        $bed_n = $request->input('bed_n', 0);
        $room_n = $request->input('room_n', 0);
        $optionals = $request->input('optionals', []);

        // Effettua una richiesta a TomTom per ottenere le coordinate dell'indirizzo
        $response = Http::withOptions(['verify' => false])
            ->get('https://api.tomtom.com/search/2/geocode/.json', [
                'query' => [
                    'address' => $address,
                    'key' => '186r2iPLXxGSFMemhylqjC36urDbgOV2',
                ],
            ]);

        if ($response->successful()) {
            $results = $response->json()['results'];

            if (count($results) > 0) {
                              
                $lat1 = $results[0]['position']['lat'];
                $lon1 = $results[0]['position']['lon'];
                
            }
        }

        $filtered = []; 
            foreach ($apartments as $apartment) {
                $lat2 = $apartment['latitude'];
                $lon2 = $apartment['longitude'];

                $R = 6371e3; //mt
                $φ1 = ($lat1 * pi()) / 180; // φ, λ in radians
                $φ2 = ($lat2 * pi()) / 180;
                $Δφ = (($lat2 - $lat1) * pi()) / 180;
                $Δλ = (($lon2 - $lon1) * pi()) / 180;
                $a =
                    sin($Δφ / 2) * sin($Δφ / 2) +
                    cos($φ1) * cos($φ2) * sin($Δλ / 2) * sin($Δλ / 2);
                $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
                $d = ($R * $c) / 1000; // distanza fra coordinate iniziali e coordinate degli appartamenti


                if ($d <= $distance) {
                    $apartment['distance'] = $d;
                    $filtered[] = $apartment; // appartamenti localizzati all'interno del raggio (distanza)
                }
            }
        

        if (!empty($optionals)) {
            foreach ($optionals as $optional) {
                foreach ($filtered as $key => $apartment_result) {
                    $apartment_optionals = DB::table('apartment_optional')->where('apartment_id', $apartment_result['id'])->pluck('optional_id')->toArray();
                    if (!in_array($optional, $apartment_optionals)) {
                        unset($filtered[$key]);
                    }
                }
            }

            return response()->json($filtered);
        } else {
            return response()->json($filtered);
        }
    }
}