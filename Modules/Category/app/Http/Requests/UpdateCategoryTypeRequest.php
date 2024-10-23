<?php

namespace Modules\Category\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryTypeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $categoryType = $this->route('category_type');

        return [
            'name' => 'required|string|max:255',
            'machine_name' => [
                'required',
                'string',
                'max:255',
                // Unique, but ignore current category.
                Rule::unique('category_types')->ignore($categoryType->id),
                'regex:/^[a-z0-9_]+$/',
                function ($attribute, $value, $fail) use ($categoryType) {
                    if ($value !== $categoryType->getOriginal('machine_name')) {
                        $fail('The '.$attribute.' cannot be changed once it is set.');
                    }
                },
            ],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
