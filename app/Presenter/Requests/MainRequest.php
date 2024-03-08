<?php

namespace App\Presenter\Requests;

use Core\Requests\FormRequest;

class MainRequest extends FormRequest
{

    public final function authorized(): bool
    {
        return true;

    }

    public function validate(): array
    {
        return [
            'name' => 'required|'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'the name is required'
        ];
    }
}