<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreTeamRequest extends FormRequest
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
            'clinic_name' => ['required'],
            'user_id'     => ['nullable', 'required_without_all:name,email,password', 'exists:users,id'],

            'name'     => ['nullable', 'required_without:user_id', 'required_with:email,password', 'string'],
            'email'    => ['nullable', 'required_without:user_id', 'required_with:name,password', 'email'],
            'password' => ['nullable', 'required_without:user_id', 'required_with:name,email', 'string', Password::defaults()],
        ];
    }
}
