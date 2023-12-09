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
        $colors = explode(',', request('colors'));
        return $colors;
        $sizes = explode(',', request('sizes'));

        request()->merge([
            'colors' => $colors,
            'sizes'  => $sizes
        ]);
        return [
            'name' => 'required',
            'factoryPrice'  => 'required|numeric|min:2',
            'pricePerUnit'  => 'required|numeric|min:2',
            'images.*'        => 'required',
            'colors'         => 'required|array',
            'sizes'          => 'required|array',
        ];
    }
}
