<?php

namespace App\Services;

use App\Models\TipoDocumento;
use Illuminate\Database\Eloquent\Collection;

class TipoDocumentoService
{
    public function index(): Collection
    {
        return TipoDocumento::select(['id', 'abreviatura as nombre'])->get();
    }
}
