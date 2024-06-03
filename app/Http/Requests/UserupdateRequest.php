<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        $userId = $this->route('user'); // Obtener el ID del usuario desde la ruta

        return [
            'name' => 'required|string|max:255',
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users')->ignore($userId),
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($userId),
            ],
            'password' => 'nullable|string|min:8|confirmed',
            'url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'note' => 'nullable|string',
            'position' => 'nullable|string|max:255',
            'skills.*' => 'nullable|string|max:255', // Regla para la matriz de habilidades
            'experiences.*' => 'nullable|string|max:255', // Regla para la matriz de experiencias
            'educations.*' => 'nullable|string|max:255', // Regla para la matriz de educaciones
            'interests.*' => 'nullable|string|max:255', // Regla para la matriz de intereses
        ];
    }
}