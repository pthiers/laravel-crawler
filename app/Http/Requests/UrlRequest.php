<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UrlRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'url'       => ['required'],
            'store_id'  => ['required', 'exists:stores'],
            'ignorable' => ['boolean'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
