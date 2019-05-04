<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAssociateRequest extends FormRequest
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
            'email' => 'required|email|unique:associates|max:255',
            'password' => 'required|max:255|regex:/^(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'confirm_password' => 'required|same:password',
            'name' => 'required|max:255',
            'phone' => 'required|numeric|unique:associates'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'Please enter email.',
            'email.unique'  => 'This email already in use.',
            'email.email'  => 'Please enter a valid email.',
            'email.max'  => 'Please enter maximum 255 characters.',

            'password.required' => 'Please enter password.',
            'password.regex' => 'Password must be more than 6 characters long, should contain at-least 1 Lowercase, 1 Numeric and 1 Special character (i.e. abc@123).',
            'password.max' => 'Please enter maximum 255 characters.',

            'confirm_password.same' => "Password and confirm password don't match.",
            'confirm_password.required' => 'Please enter confirm password.',

            'name.required' => 'Please enter name.',
            'name.max' => 'Please enter maximum 255 characters.',

            'phone.required' => 'Please enter phone number.',
            'phone.unique' => 'This phone number already in use.',
            'phone.numeric' => 'Please enter a valid phone number.',
        ];
    }
}
