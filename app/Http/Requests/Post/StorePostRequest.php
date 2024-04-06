<?php

namespace App\Http\Requests\Post;

use Illuminate\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\Console\Helper\Helper;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'user_id' => 'required|integer|exists:users,id',
        ];
    }

    public function failValidation(Validator $validator)
    {
        Helper::ThrowFailValdation($validator);
    }
    
}
