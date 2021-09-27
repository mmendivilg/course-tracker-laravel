<?php

namespace App\Validations\User;
use Illuminate\Support\Facades\Validator;
use App\Validations\Validation;

class UserLoginValidation extends Validation
{
    public function rules()
    {
        return [
            'email' => 'required',
            'password' => 'required',
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
