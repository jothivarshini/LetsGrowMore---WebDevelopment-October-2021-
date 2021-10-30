<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return  [
            'name' => ['required', 'string', 'max:150'],
            'type' => ['required', 'numeric'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Name is required',
            'email.required' => 'Email ID  is required',
            'type.required' => 'Type is required',
            'password.required' => 'Password is required'
        ];
    }
}
