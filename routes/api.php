<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApartmentController;
use App\Http\Controllers\Api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/apartments', [ApartmentController::class, 'index']);
Route::get('/apartment/{slug}', [ApartmentController::class, 'show']);

// Route::middleware(['auth'])->group(function () {
//     Route::get('/userdata', [UserController::class, 'index']);
// }); 

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    // Route::get('/userdata', [UserController::class, 'index']);
    return $request->user();
});
