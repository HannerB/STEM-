<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Asegúrate de que este método devuelva true
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'note' => 'nullable|string',
            'position' => 'nullable|string|min:25|max:255',
            'interest' => 'nullable|string|min:25|max:255',
            'experience' => 'nullable|string|min:25|max:255',
            'education' => 'nullable|string|min:25|max:255',
            'skills' => 'nullable|string|min:25|max:255',
        ];
    }
}
