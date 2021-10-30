<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return  [
            'id' => ['required', 'numeric'],
            'teacher_identity_number' => ['required', 'string', 'max:150'],
            'gender' => ['required', 'string', 'max:150'],
            'qualification' => ['required', 'string', 'max:150'],
            'blood_group' => ['required', 'string', 'max:150'],
        ];
    }

    public function messages(){
        return [
            'id.required' => 'Invalid details',
            'teacher_identity_number.required' => 'ID number  is required',
            'gender.required' => 'Gender type is required',
            'qualification.required' => 'Qualification is required',
            'blood_group.required' => 'Blood group is required'
        ];
    }
}
