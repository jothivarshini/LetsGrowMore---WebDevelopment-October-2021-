<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class ResultRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return  [
            'batch' => ['required', 'string', 'max:150'],
            'deportment' => ['required', 'string', 'max:150'],
            'student_id' => ['required', 'string', 'max:150'],
            'exam_id' => ['required', 'string', 'max:150'],
            'subject_id' => ['required', 'string', 'max:150'],
            'mark' => ['required', 'string', 'max:150'],
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Batch is required',
            'deportment.required' => 'Deportment is required',
            'student_id.required' => 'Student is required',
            'exam_id.required' => 'Exam is required',
            'subject_id.required' => 'Subject is required',
            'mark.required' => 'Mark is required',
        ];
    }
}
