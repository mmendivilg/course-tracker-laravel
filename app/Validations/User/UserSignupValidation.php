<?php

namespace App\Validations\User;
use Illuminate\Support\Facades\Validator;
use App\Validations\Validation;

class UserSignupValidation extends Validation
{
    public function rules()
    {
        return [
            'name' => 'required|max:80',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
        ];
    }

    public function messages()
    {
        return [
            // 'email.max' => ' 8? TOO MUCH!!',
        ];
    }

    public function getOtherValidations(){ }
}
