<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        $id = request()->route('setting');

        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
            'password' => ['nullable', 'string', 'min:8'],
            'image' => 'nullable|file|mimes:jpeg,bmp,png|max:2000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Имя обязательно к заполнению',
            'email.required' => 'email обязательно к заполнению',
            'email.unique' => 'Данный mail уже занят',
            'password.min' => 'Пароль должен содержать миниму :min символов',
            'image.size' => 'Изображение должно быть  не больше :max килобайт',
            'image.mimes' => 'Допустимые расширения файлов jpeg,bmp,png!',
        ];
    }
}
