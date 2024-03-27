<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

                'first_name'=>'required|unique:users,first_name|max:50',
                'last_name'=>'required|unique:users,last_name|max:50',
                'email'=>'required|unique:users,email|email',
                'phone'=>'required|min:10|numeric',
                'password'=>'required|min:6',
                'password_confirmation'=>'required|same:password|min:6'

        ];
    }
    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json($validator->errors(),422));
    }
}
