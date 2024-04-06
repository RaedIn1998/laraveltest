<?php

namespace App\Http\Requests;

use Illuminate\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\Console\Helper\Helper;

class UpdateCommentRequest extends FormRequest
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
            'comment' => 'required|string|max:255',
        ];
    }

    public function failValidation(Validator $validator): void
    {
        Helper::ThrowFailValdation($validator);
    }
}
