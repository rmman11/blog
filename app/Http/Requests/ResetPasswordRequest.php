<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
           'password' => 'required|min:8',
           'new_password' => 'required|min:8',
           'new_confirm_password' =>'required|same:new_password',
        ];
    }

    public function message(){

      return [
         
        'password.required' => 'Introduceti parola actuala',
        'password.min'  => 'Parola trebuie sa fie min 8 caractere',
        'new_password.min'  => 'Parola trebuie sa aibe min 8 caractere',
        'new_password.required' =>'Trebuie sa introduceti o noua parola',
        'new_confirm_password.same' => 'Confirmarea parolei nu este exacta',

      ];

    }
}
