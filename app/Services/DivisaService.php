<?php

namespace App\Services;

use App\Models\Divisa;
use Illuminate\Database\Eloquent\Collection;

class DivisaService
{
    public function index(): Collection
    {
        return Divisa::select(['id', 'abreviatura as nombre'])->get();
    }
}
