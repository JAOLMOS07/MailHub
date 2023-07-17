<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rules\Exists;
use Illuminate\Foundation\Http\FormRequest;

class StoreMailRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email'=> 'required|email',
            'subject' => 'required|max:255',
            'content' => 'required',
            
        ];
    }
}
