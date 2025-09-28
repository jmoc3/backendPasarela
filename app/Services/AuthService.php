<?php

namespace App\Services;

use App\Models\Factura;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function register(Request $request): User
    {
      $request->validate([
          'name'     => 'required|string|max:255',
          'email'    => 'required|string|email|unique:users',
          'password' => 'required|string|min:8|confirmed',
      ]);

      return User::create([
          'name'     => $request->name,
          'email'    => $request->email,
          'password' => Hash::make($request->password),
      ]);    
    }

    public function login(Request $request): array
    {
        $request->validate([
            'email'    => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw new \Exception('Credenciales inválidas', 406);
        }

        $token = $user->createToken('auth_token')->plainTextToken;
        return [$user, $token];
    }

    public function logout(Request $request): void
    {
        $user = $request->user();
        $user->currentAccessToken()->delete(); 
    }

}
