<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompaniesFormRequest extends FormRequest
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
            'name'          => 'required|min:3|max:100',
            'site'          => 'required|min:3|max:100',
            'color'         => 'required|min:7|max:7',
        ];

    }
    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório.',
        ];

    }
}
