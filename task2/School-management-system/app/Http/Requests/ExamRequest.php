<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class ExamRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return  [
            'name' => ['required', 'string', 'max:150', 'unique:exams'],
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Name is required',
        ];
    }
}
