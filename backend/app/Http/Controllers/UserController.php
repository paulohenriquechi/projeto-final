<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function register(Request $request){
        $user = $request;
        if($user->name<6){
            return "Mínimo de 6 letras no nome";
        }
    return $request;
}
}
