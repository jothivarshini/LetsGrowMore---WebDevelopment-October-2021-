<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return  [
            'id' => ['required', 'numeric'],
            'student_identity_number' => ['required', 'string', 'max:150'],
            'father_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'number' => ['required', 'numeric', 'digits:10'],
            'address' => ['required', 'string', 'max:150'],
            'blood_group' => ['required', 'string', 'max:150'],
            'deportment' => ['required', 'numeric'],
            'batch' => ['required', 'numeric'],
        ];
    }
    public function messages(){
        return [
            'id.required' => 'Invalid data',
            'student_identity_number.required' => 'ID number  is required',
            'father_name.required' => 'Father name is required',
            'gender.required' => 'Gender is required',
            'address.required' => 'Address is required',
            'blood_group.required' => 'Blood group is required',
            'deportment.required' => 'Deportment is required',
            'batch.required' => 'Batch is required',
        ];
    }
}
