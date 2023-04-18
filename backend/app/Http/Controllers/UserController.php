<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


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
            // confirmação de senha, utilizar no login
            // $user["token"] = Str::random(60); 
        // if (Hash::check("123456789", $user["password"])) {
        //     return "Senhas conferem";
        // } else {
        //     return "Senhas não conferem";
        // }
        return $user;
    }
    function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(Auth::attempt($request->only('email', 'password'))){
            $user = Auth::user();
            $token = Str::random(60);
            $user->remember_token = $token;
            $user->save();
            return response()->json([Auth::user(), 'token' => $token], 200);
        }else{
            $errors = "The email address or password is incorrect";               
            return response(['errors' => ['generalError' => $errors]], 422); 
        }
        // $errors = "The email address or password is incorrect";
        // $userInfo = User::where('email', $user["email"])->first();
        // if($userInfo){
        //     $password = $userInfo->password;
        //     if(Hash::check($user["password"], $password)){
        //         $token = Str::random(60);
        //         $userInfo->remember_token = $token;
        //         $userInfo->save();
        //         return $userInfo;
        //     }
        //     else{
        //         return $errors;
        //     }
        // }else{
        //     return response(['errors' => [
        //         'generalError' => $errors
        //     ]], 422);
        // }



            // anotações
            // return $errors["email"] = "User email not found";
            // return response()->json($errors, 422);
            // return response(['errors'])->json(array('error'=>$errors), 422);
        // $dataCheck = User::where('email', $user["email"])->select('password')->first();
       

        // $passwordCheck = User::select('password')->where('email', $user["email"])->get();
        
        // dd($passwordCheck);

        // return $password;
    }

    function getUser(Request $request){
        $user = User::where('remember_token', $request->token)->firstOrFail();
        return $user->id;
    }



}

// function login(Request $request){
//     $user = $request->validate([
//         'email' => 'required|email',
//         'password' => 'required|min:8',
//     ]);
//     return $user;
// }
