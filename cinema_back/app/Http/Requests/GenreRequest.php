<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['required',
                'unique:genres,title,'.$this->id,
//                Rule::unique('products')->ignore($id),
                'string',
                'min:2',
                'max:150'],
        ];
    }

    public function attributes() // обозначение переменных
    {
        return [
            'title' => 'Название',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Не введёно :attribute',
            'title.min'  => ':attribute содержит менее 2 символов',
            'title.max' => 'Превышена допустимая длина :attribute',
            'title.unique' => 'Данное :attribute уже есть в системе',
        ];
    }
}
