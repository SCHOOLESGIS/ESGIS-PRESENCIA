<?php

namespace App\Interfaces;

use App\Http\Requests\users\CreateUserRequest;
use App\Http\Requests\users\UpdateUserRequest;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

interface UserInterface
{
    public function getAllUsers () : LengthAwarePaginator;
    public function getUserByID (int $userId) : User;
    public function createUser (CreateUserRequest $createUserRequest) : User;
    public function updateUserByID (UpdateUserRequest $updateUserRequest, User $user) : User;
    public function deleteUserByID (int $userId) : User;
}
