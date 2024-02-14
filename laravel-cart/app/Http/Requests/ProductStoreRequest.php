<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => [
                "required",
                "unique:products,name",
                "min:3",
                "max:255",
            ],
            "price" => [
                "required",
                "min:0.01",
                "max:9999.99",
                "decimal:2",
            ],
            "stock" => [
                "required",
                "max:9999",
                "integer",
            ],
        ];
    }
}
