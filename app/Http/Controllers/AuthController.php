<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Helper\ResponseHandler;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{

    public function login(LoginRequest $request)
    {

        $credentials = $request->only('email', 'password');

        $token = Auth::attempt($credentials);
        if (!$token) {
            throw new ApiException('User not found', 400);
        }

        $user = Auth::user();
        return response()->json([
            'status' => 'success',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'isAdmin' => $request->isAdmin,
            'password' => Hash::make($request->password),
        ]);

        $token = Auth::login($user);
        return ResponseHandler::success('User Created', ['user'=>$user, 'token'=> $token]);
    }

    public function logout()
    {
        Auth::logout();
        return ResponseHandler::success('User Logged Out',[]);
    }

    public function refresh()
    {
        return ResponseHandler::success('User Refreshed', ['user' => Auth::user(),'token'=> Auth::refresh()]);
    }
}
