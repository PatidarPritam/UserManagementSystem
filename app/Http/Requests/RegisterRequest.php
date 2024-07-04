<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class RegisterRequest extends FormRequest
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
            'name'=>'required|min:5|max:50',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:50',
            'phone_number'=>'required|digits:10'

        ];
    }


      /**
     * Get the validation errors messages that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    public function messages(): array
    {
         return [
            'name.required'=>'Please Enter Your Name',
            'name.min'=>'Name must be at least 5 characters',
            'name.max'=>'Name must be at most 50 characters',
            'email.required'=>'Please enter your email address',
            'email.email'=>'Email must be a valid email address',
            'email.unique'=>'Email is already taken please add other email address',
            'password.required'=>'Please enter your password',
            'password.min'=>'Password must be at least 5 characters',
            'password.max'=>'Password must be at most 50 characters',
            'phone_number.required'=>'please enter your phone number',
            'phone_number.digits'=>'Phone number must be 10 digits',



         ];

    }
}
