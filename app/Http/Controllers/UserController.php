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
        $user = $request->user();
        return response()->json($user);
    }

    public function showById($id){

        $user = User::find($id);

        $userData = [
            'name' => $user->name,
            'rank' => $user->rank,
            'image' => $user->image,
            'role' => $user->role,
            'post_count' => $user->posts->count()
        ];

        return response()->json($userData);
    }

    public function count(){
        return User::all()->count();
    }

    public function latest(){
        return User::all()->last()->only(['name', 'image', 'created_at']);
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
