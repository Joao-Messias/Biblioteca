<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LoansRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'client' => 'required',
            'book' => [
                'required',
                Rule::exists('books', 'id')->where(function ($query) {
                    $query->where('quantity', '>=', $this->input('quantity'));
                }),
            ],
            'return_date' => [
                'required',
                function ($attribute, $value, $fail) {
                    $today = Carbon::now()->startOfDay();
                    $returnDate = Carbon::createFromFormat('Y-m-d', $value)->startOfDay();

                    if ($returnDate->lessThan($today)) {
                        $fail('A data de devolução não pode ser anterior ao dia de hoje.');
                    }
                },
            ],
            'quantity' => 'required|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'client.required' => 'O campo cliente é obrigatório',
            'book.required' => 'O campo livro é obrigatório',
            'book.exists' => 'O livro selecionado não tem estoque suficiente',
            'return_date.required' => 'O campo data de devolução é obrigatório',
            'quantity.required' => 'O campo quantidade é obrigatório',
            'quantity.numeric' => 'O campo quantidade deve ser um número',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
