<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
{
    /**
     * Détermine si l'utilisateur est autorisé à faire cette requête.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Règles de validation appliquées à la requête.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'nullable|numeric',
            'size' => 'nullable|string|max:255',
            'brand' => 'required|string',
            'first_img' => 'sometimes|image|mimes:jpeg,jpg,png',
            'second_img' => 'sometimes|image|mimes:jpeg,jpg,png',
            'type' => ['required', 'string', Rule::in(['rental', 'swap'])],
            'category' => ['required', 'string', Rule::in(['sac', 'robe', 'pantalon', 'smoking', 'jupe'])],
        ];
    }
}
