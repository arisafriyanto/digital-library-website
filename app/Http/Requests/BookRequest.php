<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'book_title' => ['required', 'string', 'min:3', 'max:100'],
            'category' => ['required'],
            'book_description' => ['required', 'string'],
            'book_quantity' => ['required', 'numeric'],
            'book_cover' => ['required', 'image', 'mimes:png,jpg,jpeg,svg', 'max:2048'],
            'book_file' => ['required', 'mimes:pdf', 'max:10240'],
        ];
    }
}
