<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class RegisterEmpRequest extends FormRequest
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
            'name'=>'required|unique:providers,name|max:50',
            'email'=>'required|unique:providers,email|email',
            'password'=>'required|min:6',
            'password_confirmation'=>'required|same:password|min:6',
            'image' => [
                'nullable',
                'image',
                'dimensions:max_width:3840,max_height:2160',
                'mimes:png,jpg,gif',
                'max:2765'
            ],
        ];
    }


    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json($validator->errors(),422));
    }
}
