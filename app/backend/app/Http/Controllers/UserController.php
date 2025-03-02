<?php

namespace App\Http\Controllers;

use App\Http\Requests\users\CreateUserRequest;
use App\Http\Requests\users\UpdateUserRequest;
use App\Models\User;
use App\Usecases\UserUsecase;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function __construct(private readonly UserUsecase $userUsecase){}

    /**
     * Display a listing of the resource.
     */
    public function index() : JsonResponse
    {
        $collection = $this->userUsecase->getAllUsers();
        return new JsonResponse(
            $collection,
            Response::HTTP_OK
        );
    }

    public function archive() : JsonResponse
    {
        $collection = $this->userUsecase->getAllUsersArchived();
        return new JsonResponse(
            $collection,
            Response::HTTP_OK
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $createUserRequest)
    {
        $userToCreate = $this->userUsecase->createUser($createUserRequest);
        return new JsonResponse(
            $userToCreate,
            Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(int $userId)
    {
        $userToShow = $this->userUsecase->getUserByID($userId);
        return new JsonResponse(
            $userToShow,
            Response::HTTP_OK
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $updateUserRequest, User $user)
    {
        $userToUpdate = $this->userUsecase->updateUserByID($updateUserRequest, $user);
        return new JsonResponse(
            $userToUpdate,
            Response::HTTP_OK
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $userId)
    {
        $userToDelete = $this->userUsecase->deleteUserByID($userId);
        return new JsonResponse(
            $userToDelete,
            Response::HTTP_OK
        );
    }

    public function restore(int $userId)
    {
        $userToDelete = $this->userUsecase->restoreUserByID($userId);
        return new JsonResponse(
            $userToDelete,
            Response::HTTP_OK
        );
    }
}
