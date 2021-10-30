<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class SubjectRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return  [
            'name' => ['required', 'string', 'max:150'],
            'subject_code' => ['required', 'string', 'max:150', 'unique:subjects'],
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Name is required',
            'subject_code.required' => 'Subject Code is required',
        ];
    }
}
