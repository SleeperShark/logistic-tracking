<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SnoQueryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'sno' => 'required|string|digits:16',
        ];
    }
}
