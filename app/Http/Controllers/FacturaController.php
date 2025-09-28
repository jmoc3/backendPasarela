<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFacturaRequest;
use Illuminate\Http\Request;
use App\Services\FacturaService;
use Exception;
use Illuminate\Http\JsonResponse;

class FacturaController extends Controller
{
    public function __construct(protected readonly FacturaService $facturaService) { }
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            return response()->json([
                "data"=>$this->facturaService->index(),
                "code"=>200,
                "message"=>'Facturas listadas correctamente',
            ]);
        } catch (Exception $e) {
            return response()->json([
                "data"=>[],
                "code"=>$e->getCode(),
                "message"=>$e->getMessage(),
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFacturaRequest $request): JsonResponse
    {
        try {
            return response()->json([
                "data"=>$this->facturaService->store($request->all()),
                "code"=>200,
                "message"=>'Factura almacenada correctamente',
            ]);
        } catch (Exception $e) {
            return response()->json([
                "data"=>[],
                "code"=>$e->getCode(),
                "message"=>$e->getMessage(),
            ]);
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        try {
            return response()->json([
                "data"=>$this->facturaService->update($id, $request->all()),
                "code"=>200,
                "message"=>'Factura actualizada correctamente',
            ]);
        } catch (Exception $e) {
            return response()->json([
                "data"=>[],
                "code"=>$e->getCode(),
                "message"=>$e->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        try {
            return response()->json([
                "data"=>$this->facturaService->delete($id),
                "code"=>200,
                "message"=>'Factura eliminada correctamente',
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
