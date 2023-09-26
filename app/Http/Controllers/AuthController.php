<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * function login 
     * @param Request $request
     * 
     */
    public function login(Request $request)
    {
        $data = Arr::only($request->all(), ['email', 'password']);
        // Auth::attempt to check user to user table
        if (Auth::attempt($data)) {
            /** @var \App\Models\User $user **/
            $user = Auth::user();
            $token = $user->createToken('token')->plainTextToken;

            return response()->json([
                'token' => $token,
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'role' => $user->role,
                ]
            ], 200);
        }
        return response()->json(['message' => 'Unauthorized'], 401);
    }

    /**
     * function logout
     */
    public function logout()
    {
        Log::info(Auth::user());
        /** @var \App\Models\User $user **/
        $user = Auth::user();
        $user->tokens()->delete();
       
        return response()->json(['message' => 'Đăng xuất thành công'], 200);
    }
}
