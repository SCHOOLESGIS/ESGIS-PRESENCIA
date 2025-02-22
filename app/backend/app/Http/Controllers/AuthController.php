<?php

namespace App\Http\Controllers;

use App\Http\Requests\auth\LoginRequest;
use App\Usecases\AuthUsecase;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function __construct(private readonly AuthUsecase $authUsecase) {}

    public function login (LoginRequest $loginRequest) : JsonResponse
    {
        $userLoged = $this->authUsecase->login($loginRequest);
        return new JsonResponse(
            $userLoged,
            Response::HTTP_OK
        );
    }

    public function getCurrentUser () : JsonResponse
    {
        $currentUser = $this->authUsecase->getCurrentUser();
        return new JsonResponse (
            $currentUser,
            Response::HTTP_OK
        );
    }

    public function logout (Request $request) : JsonResponse
    {
        $userLogout = $this->authUsecase->logout($request);
        return new JsonResponse(
            $userLogout,
            Response::HTTP_OK
        );
    }
}
