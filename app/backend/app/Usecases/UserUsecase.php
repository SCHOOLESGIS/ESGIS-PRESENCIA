<?php
namespace App\Usecases;

use App\Http\Requests\users\CreateUserRequest;
use App\Http\Requests\users\UpdateUserRequest;
use App\Interfaces\UserInterface;
use App\Models\Enseignant;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;

class UserUsecase implements UserInterface {
    public function getAllUsers(): LengthAwarePaginator
    {
        return User::withTrashed()->with(['enseignant'])->latest()->paginate(10);
    }

    public function getUserByID(int $userId): User
    {
        return User::withTrashed()->with(['enseignant'])->all()->findOrFail($userId);
    }

    public function createUser(CreateUserRequest $createUserRequest): User
    {
        $userData = $createUserRequest->validated();
        $user = new User();
        $user->name = $userData['name'];
        $user->surname = $userData['surname'];
        $user->email = $userData['email'];
        $user->password = Hash::make($userData['password']);
        $user->role = $userData['role'];
        $user->save();

        if($userData['role'] == "enseignant") {
            $userFound = User::query()->where('email', $userData['email'])->first();
            $enseignant = new Enseignant();
            $enseignant->user_id = $userFound->user_id;
            $enseignant->speciality = $userData['specialite'];
            $enseignant->save();
        }

        return $user;
    }

    public function updateUserByID(UpdateUserRequest $updateUserRequest, User $user): User
    {
        $userData = $updateUserRequest->validated();
        $user->name = $userData['name']??$user->name;
        $user->surname = $userData['surname']??$user->surname;
        $user->role = $userData['role']??$user->role;
        $user->save();

        return $user;
    }

    public function deleteUserByID(int $userId): User
    {
        $userToDelete = User::all()->findOrFail($userId);
        $userToShow = $userToDelete;
        $userToDelete->delete();

        return $userToShow;
    }
}
