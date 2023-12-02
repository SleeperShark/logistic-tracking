<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FakeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'num' => 'required|integer|min:1',
        ];
    }
}
