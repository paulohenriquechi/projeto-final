<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    function register(Request $request){
        $user = $request->validate([
            'username' => 'required|alpha_num|max:255|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8|same:password',
        ],[
            'username.required' => 'The username field is required',
            'username.max' => 'The username max length is 255',
            'username.unique' => 'The username has already been taken'
        ]);
        $user["password"] = bcrypt($user["password"]);
        $user = User::create([
                "username" => $user["username"],
                "email" => $user["email"],
                "password" => $user["password"],
                "picture" => "default.png"
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

    function editProfile(Request $request){
        $user = Auth::user();
        $newInfo = $request->validate([
            'username' => 'required|alpha_num|max:255',
            'email' => 'required|email',
            'password' => 'required'
        ],[
            'username.required' => 'The username field is required',
            'username.max' => 'The username max length is 255',
        ]);
        if(Hash::check($newInfo['password'], $user->password)){
            if($newInfo['username']!=$user->username){
                $userExists = User::where('username', $newInfo['username'])->first();
                if($userExists){
                    $error = ["The username has already been taken"];
                    return response(['errors' => ['username' => $error]], 422);
                }
                else{
                    $user->username = $newInfo['username'];
                }
            }
            if($newInfo['email']!=$user->email){
                $emailExists = User::where('email', $newInfo['email'])->first();
                if($emailExists){
                    $error = ["The email has already been taken"];
                    return response(['errors' => ['email' => $error]], 422);
                }
                else{
                    $user->email = $newInfo['email'];
                }
            }
            if($request->hasFile('image')&&$request->File('image')->isValid()){
                $file = $request->image;
                $fileExtension = $file->extension();
                $fileName = md5($file->getClientOriginalName().strtotime("now")).".".$fileExtension;
                Storage::putFileAs('public/image', $file, $fileName);
                $user->picture = $fileName;
            }    
            $user->save();
        }else{
            $error = ["The credentials provided are invalid"];
            return response(['errors' => ['password' => $error]], 422);
        }

    }

    function logout(){
        auth()->user()->currentAccessToken()->delete();
    }
}
