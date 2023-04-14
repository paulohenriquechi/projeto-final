<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function register(Request $request){
        $user = $request->validate([
            // 'name' => "required|regex:/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/|max:255",
            'username' => "required|regex:^(?=.{8,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$|max:255|unique:users,username",
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8|same:password'
        ]);
        $user["password"] = bcrypt($user["password"]);
        // confirmação de senha, utilizar no login
        // if (Hash::check("123456789", $user["password"])) {
        //     return "Senhas conferem";
        // } else {
        //     return "Senhas não conferem";
        // }
        return $user;
}
}
