<?php

use Illuminate\Validation\Rule;

class AddCategoryTypeRules
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'machine_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('category_types'),
                'regex:/^[a-z0-9_]+$/',
            ],
        ];
    }
}
