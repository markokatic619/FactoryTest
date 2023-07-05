<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MealRequestValidation extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'per_page' => 'sometimes|integer|min:1',
            'page' => 'sometimes|integer|min:1',
            'category' => ['nullable', 'regex:/^(null|!null|\d+)$/'],
            'tags' => 'nullable|string',
            'with' => 'nullable|string',
            'lang' => 'required|string',
            'diff_time' => 'nullable|integer',
        ];
    }

}
