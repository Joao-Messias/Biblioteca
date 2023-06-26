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
            'isbn' => 'required|string|max:100',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
