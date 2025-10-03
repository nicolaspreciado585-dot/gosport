<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
     public function rules(): array
    {
        return [
        'first_name'    => 'nullable|string|max:20',    
        'last_name'     => 'required|string|max:25',
        'email'         => 'required|email|unique:cliente,email',
        'phone_number'    => 'required|string|max:10|min:',    

        ];
    }
    public function messages()
{
    return [
        'first_name.max'      => 'El nombre no puede superar 20 caracteres.',
        'last_name.required'  => 'El apellido es obligatorio.',
        'email.required'      => 'El correo electrónico es obligatorio.',
        'email.email'         => 'Debe ingresar un correo válido.',
        'email.unique'        => 'Este correo ya está registrado.',
        'iphone_number.max'      => 'El nombre no puede superar 10 caracteres.',
    ];
}
}
