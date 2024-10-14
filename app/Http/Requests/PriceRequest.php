<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PriceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'url_id'      => ['required', 'exists:urls'],
            'date'        => ['required', 'date'],
            'price'       => ['nullable', 'numeric'],
            'offer_price' => ['nullable', 'numeric'],
            'card_price'  => ['required', 'numeric'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
