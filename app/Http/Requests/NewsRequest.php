<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'content' => 'required|string',
            'slug' => 'string',
            'date_of_the_new_story' => 'required|date',
            'url' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'El título es obligatorio.',
            'title.string' => 'El título debe ser una cadena de texto.',
            'description.required' => 'La descripción es obligatoria.',
            'description.string' => 'La descripción debe ser una cadena de texto.',
            'content.required' => 'El contenido es obligatorio.',
            'content.string' => 'El contenido debe ser una cadena de texto.',
            'date_of_the_new_story.required' => 'La fecha de la noticia es obligatoria.',
            'date_of_the_new_story.date' => 'La fecha de la noticia debe ser una fecha válida.',
            'url.required' => 'El archivo de imagen es obligatorio.',
            'url.image' => 'El archivo debe ser una imagen.',
            'url.mimes' => 'El archivo debe ser de tipo: jpeg, png, jpg o gif.',
            'url.max' => 'El tamaño máximo del archivo es de 2048 KB.',
        ];
    }
}
