<?php

namespace App\Services;

use App\Models\Factura;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class FacturaService
{
    public function index(): Collection
    {
        return Factura::with(['tipo_documento','divisa'])->get();
    }

    public function store(array $data): Factura
    {
        Log::info("Data: ", [$data]);
        $factura = Factura::create($data);
        return $factura->load(['tipo_documento', 'divisa']);
    }

    public function update(int $id, array $data): bool
    {
        $factura = Factura::findOrFail($id);
        return $factura->update($data);
    }

    public function delete(int $id): bool
    {
        $factura = Factura::findOrFail($id);
        return $factura->delete();
    }
}
