<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        try {
            $user = User::find(Auth::id());
            $token = $user->createToken('API Token')->plainTextToken;
        } catch (\Throwable $th) {
            Log::error('Error during API login', [
                'error' => $th->getMessage(),
                'userId' => $user->id ?? null,
            ]);

            return response()->json([
                'message' => 'An error occurred while creating the token',
                'error' => $th->getMessage()
            ], 500);
        }

        return response()->json([
            'message' => 'Login successful',
            'token' => $token,
            'user' => $user
        ], 200);
    }
}
