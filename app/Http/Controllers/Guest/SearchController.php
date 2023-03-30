<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Apartment;

class SearchController extends Controller
{
    public function search(Request $request)
    {
       $form_data = $request->all();
       dd($form_data);
    }
}


// namespace App\Http\Controllers\Api;

// use Illuminate\Http\Request;
// use TomTom\Laravel\Facades\TomTom;

// class SearchController extends Controller
// {
//     public function search(Request $request)
//     {
//         $results = TomTom::search($request->input('query'));

//         if ($results->count() > 0) {
//             $location = $results->first();

//             $nearbyResults = TomTom::nearbySearch([
//                 'lat' => $location->getLatitude(),
//                 'lon' => $location->getLongitude(),
//                 'radius' => 20000
//             ]);

//             $locations = Location::select('id', 'name', 'latitude', 'longitude')
//                 ->whereRaw('ST_Distance_Sphere(point(longitude, latitude), point(?, ?)) <= ?', [
//                     $location->getLongitude(),
//                     $location->getLatitude(),
//                     20000
//                 ])
//                 ->get();

//             return response()->json([
//                 'locations' => $locations
//             ]);
//         } else {
//             return response()->json([
//                 'error' => 'No results found'
//             ], 404);
//         }
//     }
// }
