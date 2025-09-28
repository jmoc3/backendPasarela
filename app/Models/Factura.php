<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use  App\Models\Divisa;
use  App\Models\TipoDocumento;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Factura extends Model
{
    protected $table = 'facturas';
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'transactor',
        'documento',
        'tipo_documento_id',
        'numero_tarjeta',
        'fecha_vencimiento_tarjeta',
        'codigo_seguridad_tarjeta',
        'monto',
        'divisa_id',
        'descripcion'
    ];

    public function tipo_documento(): BelongsTo{
        return $this->BelongsTo(TipoDocumento::class, 'tipo_documento_id', 'id');
    }

    public function divisa(): BelongsTo{
        return $this->BelongsTo(Divisa::class, 'divisa_id', 'id');
    }

}
