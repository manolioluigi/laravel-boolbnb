<?php

namespace App\Http\Controllers\Api;
use App\Models\Apartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class SearchController extends Controller
{

    public function search(Request $request)
    {
        $apartments = Apartment::all();
        $lat1 = '';
        $lon1 = '';

        // Ottengo i dati dal form
        $address = $request->input('address');
        $distance = (int)$request->input('distance', 20);
        $bed_n = (int)$request->input('bed_n', 0);
        $room_n = (int)$request->input('room_n', 0);
        $optionals = $request->input('optionals', []);

        // Effettua una richiesta a TomTom per ottenere le coordinate dell'indirizzo
        // Creo un'istanza del client GuzzleHttp
        $client = new \GuzzleHttp\Client([
            'verify' => false
        ]);

        // Eseguo una richiesta GET all'API di TomTom per ottenere le coordinate geografiche dell'indirizzo
        $response = $client->get('https://api.tomtom.com/search/2/geocode/' . urlencode($address) . '.json', [
        'query' => [
            'key' => '186r2iPLXxGSFMemhylqjC36urDbgOV2', // chiave API di TomTom
        ],
        ]);
            
            $results = $response->json()['results'];

            if (count($results) > 0) {

                // Decodifico la risposta JSON e recupera le coordinate geografiche
                $geocode_data = json_decode($response->getBody(), true);
                $lon1 = $geocode_data['results'][0]['position']['lon'];
                $lat1 = $geocode_data['results'][0]['position']['lat'];

                return response()->json($lat1);
                // // Calcola la latitudine e la longitudine massima e minima in base alla distanza richiesta
                // $max_lat = $lat1 + rad2deg($distance / 6371);
                // $min_lat = $lat1 - rad2deg($distance / 6371);
                // $max_lon = $lon1 + rad2deg(asin($distance / 6371) / cos(deg2rad($lat1)));
                // $min_lon = $lon1 - rad2deg(asin($distance / 6371) / cos(deg2rad($lat1)));

                // // Filtra gli appartamenti in base alla latitudine e longitudine massima e minima
                // $filtered = $apartments->whereBetween('latitude', [$min_lat, $max_lat])
                //     ->whereBetween('longitude', [$min_lon, $max_lon])
                //     ->where('bed_n', '>=', $bed_n)
                //     ->where('room_n', '>=', $room_n)
                //     ->get();

                // if (!empty($optionals)) {
                //     foreach ($optionals as $optional) {
                //         foreach ($filtered as $key => $apartment_result) {
                //             $apartment_optionals = DB::table('apartment_optional')->where('apartment_id', $apartment_result['id'])->pluck('optional_id')->toArray();
                //             if (!in_array($optional, $apartment_optionals)) {
                //                 unset($filtered[$key]);
                //             }
                //         }
                //     }
                //     return response()->json($filtered);

                // } else {

                //     return response()->json($filtered);

                // }
            }

        
        return response()->json([]);
    }

}