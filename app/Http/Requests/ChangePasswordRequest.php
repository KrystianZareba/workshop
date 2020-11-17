<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'old_password' => 'required',
            'password' => 'required|confirmed'
        ];
    }

    /**
     * @return array
     */
    public function messages(){
        return [
            'password.confirmed' => 'Hasła różnią się od siebie'
        ];
    }
}
