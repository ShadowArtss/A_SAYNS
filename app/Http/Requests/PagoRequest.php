<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PagoRequest extends FormRequest
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
            'pagare_id' => 'required|exists:pagares,id',
            'usuario_id' => 'required|exists:users,id',
            'monto_pago' => 'required|numeric|min:0',
            'fecha_pago' => 'required|date',
            'metodo_pago' => 'required|string|max:255',
            'refencia_transaccion' => 'nullable|string|max:255',
            'estatus' => 'required|in:pendiente,completado,fallido'
        ];
    }
}
