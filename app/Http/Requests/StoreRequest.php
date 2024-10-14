<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'key'  => ['required'],
            'url'  => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
