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
            'date_of_the_new_story' => 'required|date',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:5048',
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
            'description.required' => 'La descripción es obligatoria.',
            'content.required' => 'El contenido es obligatorio.',
            'date_of_the_new_story.required' => 'La fecha de la noticia es obligatoria.',
            'date_of_the_new_story.date' => 'La fecha de la noticia debe ser una fecha válida.',
            'images.*.image' => 'Cada archivo debe ser una imagen.',
            'images.*.mimes' => 'Cada archivo debe ser de tipo: jpeg, png, jpg o gif.',
            'images.*.max' => 'El tamaño máximo de cada archivo es de 5048 KB.',
        ];
    }
    /**
     * Configure the validator instance.
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $input = $this->all();
            if (empty($input['title']) && empty($input['description']) && empty($input['content']) && empty($input['date_of_the_new_story']) && !$this->hasFile('url')) {
                $validator->errors()->add('fields', 'Por favor, llenar todos los campos obligatorios.');
            }
        });
    }
}
