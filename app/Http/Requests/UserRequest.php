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
        'position' => 'nullable|string|max:255',
        'area' => 'nullable|string|max:255',
        'phone_number' => 'nullable|string|max:20',
        'twitter_link' => 'nullable|url|max:255',
        'facebook_link' => 'nullable|url|max:255',
        'linkedin_link' => 'nullable|url|max:255',
        'college' => 'nullable|url|max:255',
        'skills' => 'nullable|array',
        'skills.*' => 'nullable|string|max:255',
        'experiences' => 'nullable|array',
        'experiences.*' => 'nullable|string|max:255',
        'educations' => 'nullable|array',
        'educations.*' => 'nullable|string|max:255',
        'interests' => 'nullable|array',
        'interests.*' => 'nullable|string|max:255',
    ];
}

}
