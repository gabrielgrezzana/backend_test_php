<?php

namespace App\Http\Controllers;

use App\Http\Models\UserModel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Tymon\JWTAuth\Facades\JWTAuth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function getTokenUserId()
    {
        $user = JWTAuth::parseToken()->authenticate();
        return $user->id_user;
    }

    protected function validateUserHasRoles($roles)
    {
        $userRoles = $this->getAuthUserRoles();
        foreach ($roles as $role) {
            if (in_array($role, $userRoles)) {
                return true;
            }
        }
        return false;
    }

    private function getAuthUserRoles()
    {
        $user = JWTAuth::parseToken()->authenticate();
        if ($user) {
            $fountUser =  UserModel::with('roles')->find($user->id_user);
            $roles = [];
            foreach ($fountUser->roles as $item) {
                $roles[] = $item->role->nome_role;
            }
            return $roles;
        } else {
            return [];
        }
    }
}
