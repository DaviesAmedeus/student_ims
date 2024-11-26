<?php

namespace App\Http\Requests\Parent;

use Illuminate\Foundation\Http\FormRequest;

class InsertParentFormRequest extends FormRequest
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
            'profile_picture'=> ['nullable'],
            'name'           => ['required', 'min:3', 'max:20'],
            'middle_name'    => ['nullable'],
            'last_name'      => ['required', 'min:3', 'max:20'],
            'email'          => ['required', 'unique:users', 'email'],
            'occupation'     => ['max:255'],
            'address'        => ['max:255'],
            'mobile_number'  => ['max:15', 'min:8'],
            'gender'         => ['required'],
            'status'         => ['required'],
            'password'       => ['required', 'min:6', 'max:12'],
        ];
    }
}
