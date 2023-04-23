<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    function register(Request $request){
        $user = $request->validate([
            //regex nome regex:/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/
            //regex user regex:/(^([a-zA-z]+)(\d+)?$)/u
            'username' => 'required|alpha_num|max:255|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8|same:password',
        ],[
            'username.required' => 'The username field is required',
            'username.regex:' => 'The username field must be a valid',
            'username.max' => 'The username max length is ',
            'username.unique' => 'The username has already been taken'
        ]);
        $user["password"] = bcrypt($user["password"]);
        $user = User::create([
                "username" => $user["username"],
                "email" => $user["email"],
                "password" => $user["password"],
        ]);
        return $user;
    }
    function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(Auth::attempt($request->only('email', 'password'))){
            $user = Auth::user();
            $token = auth()->user()->createToken('auth_token');
            return response()->json([
                'token' => $token->plainTextToken
            ]);
        }else{
            $errors = "The email address or password is incorrect";               
            return response(['errors' => ['generalError' => $errors]], 422); 
        }
    }

    function authUser(Request $request){
        return $request->user();
    }

    function logout(){
        auth()->user()->currentAccessToken()->delete();
    }
}
