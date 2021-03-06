<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsSaveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    /*
    public function authorize()
    {
        return false;
    }
     
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    
    # Проверка валидации для формы Новостей
    public function rules()
    {
        return [
            'categories' => 'required|min:3|max:20',
            'message' => 'required|min:10|max:200',
        ];
    }
}
