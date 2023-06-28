<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    public function rules(): array
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:clients,email,' . $this->id,
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required|size:2',
            'zipcode' => 'required|size:8',
            'country' => 'required'
        ];
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            unset($rules['email']);
        }
        return $rules;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nome é obrigatório',
            'email.required' => 'Email é obrigatório',
            'email.email' => 'Email inválido',
            'email.unique' => 'Email já cadastrado',
            'phone.required' => 'Telefone é obrigatório',
            'address.required' => 'Endereço é obrigatório',
            'city.required' => 'Cidade é obrigatório',
            'state.required' => 'Estado é obrigatório',
            'zipcode.required' => 'CEP é obrigatório',
            'country.required' => 'País é obrigatório',
            'state.size' => 'Estado deve ter 2 caracteres',
            'zipcode.size' => 'CEP deve ter 8 caracteres'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
