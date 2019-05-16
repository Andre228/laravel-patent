<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 16.05.2019
 * Time: 17:26
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MuseumPostUpdateRequest extends FormRequest
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
            'title' => 'required|min:5|max:200',
            'slug' => 'max:200',
            'excerpt' => 'max:500',
            'content_raw' => 'required|string|max:10000|min:5',
            'category_id' => 'required|integer|exists:categories,id'
        ];
    }

//    public function messages()
//    {
//        return [
//            'description.min' => 'Необходимо ввести больше чем 3 символа',
//            'title.min' => 'Необходимо ввести больше чем 5 символов'
//        ];
//    }

}