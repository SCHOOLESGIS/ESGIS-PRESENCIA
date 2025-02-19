<?php

namespace App\Usecases;

use App\Http\Requests\LoginRequest;
use App\Interfaces\AuthInterface;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthUsecase implements AuthInterface {
    public function login(LoginRequest $loginRequest): array
    {
        $credentials = $loginRequest->validated();
        $user = User::where('email',$credentials['email'])->first();
        if(!$user || !Hash::check($credentials['password'],$user->password)){
            throw new Exception("Crédentials invalide !");
        }
        $token = $user->createToken($user->name.'-AuthToken')->plainTextToken;
        return [
            'user' => $user,
            'access_token' => $token
        ];
    }

    public function getCurrentUser(): User
    {
        $user = Auth::user();
        return $user;
    }

    public function logout(Request $request): array
    {
        $userLogout = $this->getCurrentUser();
        $request->user()->currentAccessToken()->delete();
        return [
            "user" => $userLogout,
          "message"=>"logged out"
        ];
    }
}
