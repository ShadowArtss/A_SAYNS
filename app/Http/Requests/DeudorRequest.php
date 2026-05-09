<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;


class DeudorRequest extends FormRequest
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
            'nombres' => 'required|string|max:255',
            'apellido_p' => 'required|string|max:255',
            'apellido_m' => 'nullable|string|max:255',
            'celular' => 'required|string|max:20',
            'telefono_fijo' => 'nullable|string|max:20',
            'curp' => [
                'required',
                'string',
                'size:18',
                'regex:/^[A-Z]{4}[0-9]{6}[H,M][A-Z]{5}[A-Z0-9]{2}$/',
                'unique:deudores,curp,' . ($this->deudor ? $this->deudor->id : ''),
            ],
            'email' => 'required|email|max:255|unique:deudores,email,' . ($this->deudor ? $this->deudor->id : ''),
            'estatus' => 'required|in:activo,inactivo',
            'direccion_id' => 'required|exists:direcciones,id',
        ];
    }
}
