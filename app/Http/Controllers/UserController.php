<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function register(){
        //
    }

    public function login(Request $request){

        $request->validate(['email' => 'required|email', 'password' => 'required']);
        $user = User::where('email', $request->email)->first();

        if(! $user || ! bcrypt($request->password) == $user->password){
            return response()->json(['message' => 'invalid credentials!'], 401);
        }

        $user->tokens()->delete();

        $key = $user->name . $user->email . Str::random(40);

        $token =  $user->createToken($key)->plainTextToken;
        return response()->json(['token' => $token], 200);
    }
    
    public function logout(Request $request){
        if($request->userId){
            $user = User::find($request->userId);
            return $user->tokens()->delete();
        }  
    }

    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show(Request $request)
    {
        // TODO: change to retrieving user by token, review next to auth.js - me function
        $user = $request->user();
        return response()->json($user);
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function delete(User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        //
    }
}
