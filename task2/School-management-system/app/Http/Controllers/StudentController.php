<?php


namespace App\Http\Controllers;


use App\Http\Requests\StudentRequest;
use App\Models\Batch;
use App\Models\Deportment;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class StudentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_model = new User();
        $students = $user_model->getAllStudents();
        return view('pages.student.index', compact('students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student_model = new Student();
        $batch_model = new Batch();
        $deportment_model = new Deportment();
        $student = $student_model->findById($id);
        $batches = $batch_model->getBatches();
        $deportment = $deportment_model->getDeportment();
        return view('pages.student.edit', compact('student','batches','deportment'));
    }

    /**
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request)
    {
        $student_model = new Student();
        $id = $request->input("id");
        $data = [];
        $data['student_identity_number'] = $request->input("student_identity_number");
        $data['father_name'] = $request->input("father_name");
        $data['gender'] = $request->input("gender");
        $data['number'] = $request->input("number");
        $data['address'] = $request->input("address");
        $data['blood_group'] = $request->input("blood_group");
        $data['deportment'] = $request->input("deportment");
        $data['batch'] = $request->input("batch");
        $update = $student_model->updateDetail($data, $id);

        if($update)
        {
            return redirect('/student')->with('success', 'Updated Successfully..');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $student_model = new Student();
        $id = $request->input("id");
        $student_model->deleteById($id);
        return redirect('/student')->with('success', 'Deleted successfully..');
    }

    public function ajaxStudentList(Request $request)
    {
       $student_model = new Student();
       $deportment = $request->input("deportment");
       $batch = $request->input("batch");
       $result = $student_model->findByDeportment($deportment, $batch);
       if($result) {
           return Response::json(['result' => $result, 'message' => "success"], 200);
       }
        return Response::json(['result' => '', 'message' => 'error'], 200);
    }
}
