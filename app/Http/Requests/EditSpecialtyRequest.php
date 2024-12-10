<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditSpecialtyRequest extends FormRequest
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
            'name' => 'max:255|min:10',
            'description' => 'required',
            'image' => 'required|max:2048'
        ];
    }
    public function messages(){
        return [
            'name.max' => 'The specialty name cannot be longer than 255 characters',
            'name.min' => 'The specialty name cannot be shorter than 10 characters',
            'image.required' => 'The image is required',
            'image.max' => 'The file size must not exceed 2MB',
        ];
    }
}
