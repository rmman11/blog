<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
             'name' => 'required|max: 50',
             'email' => 'required|email|unique:users,email',
             'phone' => 'max:30',
             'address' =>'required|max:120',
             'role'   => 'required',
             'password' =>'required|min:8|confirmed',
        ];
    }

    public function message(){


        return [
                'name.required' => 'Type your name it s obligatory',
                'name.max' => 'Shouldn t have must 50 caracteres',
                 'email.required' =>'Must have an email address',
                 'email.unique' =>'Email already exists in our database',
                 'phone.max' =>'The number of phone dont have 30 character',
                  'password.required' =>'You must have a password',
                  'password.min' => 'Your password must have eight characteres',
                  'password.confirmed' =>'Parola confirmata nu este corecta',


        ];
    }
}
