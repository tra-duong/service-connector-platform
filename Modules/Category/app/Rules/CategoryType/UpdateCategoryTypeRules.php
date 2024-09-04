<?php

use Illuminate\Validation\Rule;

class UpdateCategoryTypeRules
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules($id, $originalMachineName): array
    {
        return [
            'name' => 'required|string|max:255',
            'machine_name' => [
                'required',
                'string',
                'max:255',
                // Unique, but ignore current category.
                Rule::unique('category_types')->ignore($id),
                'regex:/^[a-z0-9_]+$/',
                function ($attribute, $value, $fail) use ($originalMachineName) {
                    if ($value !== $originalMachineName) {
                        $fail('The '.$attribute.' cannot be changed once it is set.');
                    }
                },
            ],
        ];
    }
}
