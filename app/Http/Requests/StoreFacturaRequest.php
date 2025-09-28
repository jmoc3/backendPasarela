<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFacturaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'divisa_id' => 'required|integer|min:1',
            'monto' => 'required|numeric|min:1',
            'descripcion' => 'required|string|max:255',
            'transactor' => 'required|string|max:255',
            'documento' => 'required|integer|min:1',
            'tipo_documento_id' => 'required|integer|min:1',
            'numero_tarjeta' => 'required|digits_between:13,19',
            'fecha_vencimiento_tarjeta' => 'required|date_format:Y-m-d|after_or_equal:today',
            'codigo_seguridad_tarjeta' => 'required|digits_between:3,4',
        ];
    }
}
