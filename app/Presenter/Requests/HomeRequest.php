<?php

namespace App\Presenter\Requests;

use Core\Requests\FormRequest;

class HomeRequest extends FormRequest
{

    public final function authorized(): bool
    {
        return true;

    }

    public function validate(): array
    {
        return [ ];
    }

    public function messages(): array
    {
        return [ ];
    }
}