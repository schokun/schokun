<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:10',
            'text' => 'required',
            'image' => 'nullable|file|mimes:jpeg,bmp,png|max:2000',
        ];

    }

    public function messages()
    {
        return [
            'title.required' => 'Тема поста обязательна к заполнению',
            'title.min' => 'Тема должна быть не меньше 10 символов',
            'text.required' => 'Содержимое  поста обязательна к заполнению',
            'image.mimes' => 'Допустимые расширения файлов jpeg,bmp,png!',
        ];
    }
}
