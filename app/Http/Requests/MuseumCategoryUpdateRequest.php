<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MuseumCategoryUpdateRequest extends FormRequest
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
            'title' => 'required|min:5|max:200|unique:posts',
            'slug' => 'max:200|unique:posts',
            'description' => 'string|max:500|min:3',
            'parent_id' => 'required|integer|exists:categories,id'
        ];
    }

    public function messages()
    {
      return [
            'description.min' => 'Необходимо ввести больше чем 3 символа',
            'title.min' => 'Необходимо ввести больше чем 5 символов'
        ];
    }
}
