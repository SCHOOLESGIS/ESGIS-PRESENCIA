<?php

namespace App\Interfaces;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;

interface AuthInterface
{
    public function login (LoginRequest $loginRequest) : array;
    public function getCurrentUser () : User;
    public function logout (Request $request) : array;
}
