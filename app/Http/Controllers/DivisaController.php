<?php

namespace App\Http\Controllers;

use App\Services\DivisaService;
use Illuminate\Http\JsonResponse;
use Exception;

class DivisaController extends Controller
{
    public function __construct(protected readonly DivisaService $divisaService) { }
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            return response()->json([
                "data"=>$this->divisaService->index(),
                "code"=>200,
                "message"=>'Divisas listadas correctamente',
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
