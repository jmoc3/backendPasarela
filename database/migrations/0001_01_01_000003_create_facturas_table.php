<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->string('transactor');
            $table->string('documento',10);
            $table->unsignedBigInteger('tipo_documento_id');
            $table->string('numero_tarjeta',19);
            $table->date('fecha_vencimiento_tarjeta');
            $table->string('codigo_seguridad_tarjeta',4);
            $table->decimal('monto', 15, 2);
            $table->unsignedBigInteger('divisa_id');
            $table->string('descripcion', 255);
            $table->foreign('tipo_documento_id')->references('id')->on('tipos_documentos');
            $table->foreign('divisa_id')->references('id')->on('divisas');
            $table->tinyInteger('estado')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};
