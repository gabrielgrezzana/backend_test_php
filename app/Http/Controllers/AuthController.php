<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Models\UserModel;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $foundUser =  UserModel::where('email', $request->email)
            ->first();

        if ($foundUser && Hash::check($request->password, $foundUser->password)) {
            $token = auth()->login($foundUser);
            return $this->respondWithToken($token);
        } else {
            return response()->json(['error' => 'Não autenticado'], 401);
        }
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        $foundUser = auth()->user();
        if (!$foundUser) {
            return response()->json(['error' => 'Nenhum usuário encontrado'], 401);
        }
        return response()->json($foundUser);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
