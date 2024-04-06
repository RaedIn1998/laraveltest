<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Helper\Helper;

class StorePostCommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'comment' => 'required|string|max:255',
            'user_id' => 'required|integer|exists:users,id',
        ];
    }

    public function failValidation(Validator $validator): void
    {
        Helper::ThrowFailValdation($validator);
    }
}
