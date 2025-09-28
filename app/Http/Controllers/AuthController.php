<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function __construct(protected readonly AuthService $authService){ }
    public function register(Request $request)
    {
      try {
        $user = $this->authService->register($request);

        return response()->json([
          "data"=>[
              'user'    => $user
          ],
          "code"=>201,
          "message"=>'Usuario registrado exitosamente',
        ]);
      } catch (Exception $e) {
        return response()->json([
            "data"=>[],
            "code"=>$e->getCode(),
            "message"=>$e->getMessage(),
        ]);
      }
    }

    public function login(Request $request)
    {
      try{
        [$user, $token] = $this->authService->login($request);
        Log::info("User - token: ", [$user, $token]);
        return response()->json([
          "data"=>[
              'token'   => $token,
              'user'    => $user
          ],
          "code"=>200,
          "message"=>'Login exitoso',
        ]);
      } catch (Exception $e) {
        Log::debug("Error: ", [$e]);
        return response()->json([
            "data"=>[],
            "code"=>$e->getCode(),
            "message"=>$e->getMessage(),
        ]);
      }
    }

    public function logout(Request $request)
    {
      try{
        $this->authService->logout($request); 
        return response()->json([
          "data"=>[],
          "code"=>200,
          "message"=>'Logout exitoso',
        ]);
      } catch (Exception $e) {
        return response()->json([
            "data"=>[],
            "code"=>$e->getCode(),
            "message"=>$e->getMessage(),
        ]);
      }
    }

    public function me(Request $request)
    {
      try {
        return response()->json([
          "data"=>[
            'user' => $request->user(),
          ],
          "code"=>200,
          "message"=>'Proceso exitoso',
        ]);
      } catch (Exception $e) {
        return response()->json([
            "data"=>[],
            "code"=>$e->getCode(),
            "message"=>$e->getMessage(),
        ]);
      }    
    }
}
