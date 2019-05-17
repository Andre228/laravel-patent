<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 17.05.2019
 * Time: 15:37
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class MuseumPostCreateRequest extends FormRequest
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
            'excerpt' => 'max:500',
            'content_raw' => 'required|string|max:10000|min:5',
            'category_id' => 'required|integer|exists:categories,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Введите заголовок статьи',
            'title.min' => 'В заголовке необходимо ввести больше чем 5 символов',
            'title.max' => 'В заголовке необходимо ввести меньше чем 200 символов',
            'title.unique' => 'Статья с таким заголовком уже существует',

            'slug.max' => 'В индетификаторе необходимо ввести меньше чем 200 символов',
            'slug.unique' => 'Статья с таким индетификатором уже существует',

            'excerpt.max' => 'В выдержке необходимо ввести меньше чем 500 символов',

            'content_raw.required' => 'Заполните поле для статьи',
            'content_raw.min' => 'В статье необходимо ввести больше чем 5 символов',
            'content_raw.max' => 'В статье необходимо ввести меньше чем 10000 символов',
        ];
    }

}