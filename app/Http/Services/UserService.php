<?php

namespace App\Http\Services;

use App\Http\Repositories\UserRepository;

class UserService
{
    private $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create($name, $email, $password)
    {
        return $this->userRepository->create($name, $email, bcrypt($password));
    }

    public function read($id)
    {
        return $this->userRepository->read($id);
    }
}
