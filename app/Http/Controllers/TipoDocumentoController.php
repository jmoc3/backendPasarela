<?php

namespace App\Http\Controllers;

use App\Models\TipoDocumento;
use App\Services\TipoDocumentoService;
use Illuminate\Http\JsonResponse;
use Exception;

class TipoDocumentoController extends Controller
{
    public function __construct(protected readonly TipoDocumentoService $tipoDocumentoService) { }
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            return response()->json([
                "data"=>$this->tipoDocumentoService->index(),
                "code"=>200,
                "message"=>'Tipos de documentos listadas correctamente',
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
