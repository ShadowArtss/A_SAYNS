<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PagareRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'deudor_id' => 'required|exists:deudors,id',
            'expediente_id' => 'required|exists:expedientes,id',
            'seguimiento_id' => 'required|exists:seguimientos,id',
            'aseguradora_id' => 'required|exists:aseguradoras,id',
            'monto_original' => 'required|numeric|min:0',
            'saldo' => 'required|numeric|min:0',
            'fecha_emision' => 'required|date',
            'fecha_compra' => 'required|date|after_or_equal:fecha_emision',
            'estatus' => 'required|in:activo,liquidado,incobrable'
        ];
    }
}
