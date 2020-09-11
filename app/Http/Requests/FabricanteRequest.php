<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FabricanteRequest extends FormRequest
{
    /*
    Para criar uma request personalizada, é utilizado o seguinte comando:
    php artisan make:request FabricanteRequest
    */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "nome" => "required|string",
            "site" => "required|url"
        ];
    }
}