<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:100',
            'author' => 'required|string|max:100',
            'publisher' => 'required|string|max:100',
            'isbn' => 'required|string|max:100|unique:books,isbn,' . $this->id,
            'quantity' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'O campo título é obrigatório',
            'title.max' => 'O campo título deve ter no máximo 100 caracteres',
            'author.required' => 'O campo autor é obrigatório',
            'author.max' => 'O campo autor deve ter no máximo 100 caracteres',
            'publisher.required' => 'O campo editora é obrigatório',
            'publisher.max' => 'O campo editora deve ter no máximo 100 caracteres',
            'isbn.required' => 'O campo ISBN é obrigatório',
            'isbn.max' => 'O campo ISBN deve ter no máximo 100 caracteres',
            'isbn.unique' => 'O ISBN informado já existe',
            'quantity.required' => 'O campo quantidade é obrigatório',
            'quantity.integer' => 'O campo quantidade deve ser um número inteiro',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
