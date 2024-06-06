<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateNewsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $newsId = $this->route('news')->id;

        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'required|string',
            'date_of_the_new_story' => 'required|date',
            'url' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'slug' => [ 'required', 'string', 'max:255', Rule::unique('news')->ignore($newsId),
            ],
        ];
    }
}
