<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'factoryPrice'  => 'required|numeric|min:2',
            'pricePerUnit'  => 'required|numeric|min:2',
            'images'        => 'required|array',
            'colors'         => 'required|array',
            'colors.*'       => 'required|exists:colors,name',
            'sizes'          => 'required|array',
            'sizes.*'        => 'required|exists:sizes,name',
        ];
    }
}
