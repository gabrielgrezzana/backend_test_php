<?php

namespace App\Http\Repositories;

use App\Http\Models\UserModel;

class UserRepository
{
    public function create($name, $email, $password)
    {
        $user = UserModel::create([
            "name" => $name,
            "email" => $email,
            "password" => $password,
        ]);
        $user->save();
        return $user;
    }

    public function read($id)
    {
        return UserModel::find($id);
    }
}
