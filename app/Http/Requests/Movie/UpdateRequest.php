<?php

namespace App\Http\Requests\Movie;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'description' => 'required|string',
            'year' => 'required|string',
            'main_image' => 'nullable|file',
            'category_id' => 'required|exists:categories,id'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please add movie title',
            'name.string' => 'Movie title must be a type of string',
            'description.required' => 'Please add movie description',
            'description.string' => 'Description must be a type of string',
            'year.required' => 'Please add movie year',
            'year.integer' => 'Year must be a type of integer',
            'main_image.required' => 'Please add poster image',
            'main_image.file' => 'Poster must be a type of .jpg .jpeg .bmp .png',
        ];
    }
}
