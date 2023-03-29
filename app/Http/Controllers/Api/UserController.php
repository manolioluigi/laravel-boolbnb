<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function index(){
 
        if (Auth::check()) {
            $user = "ciao";
        }

        return response()->json([
            'success' => true,
            'results' => $user,
        ]);
    }

}
