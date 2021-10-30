<?php


namespace App\Http\Controllers;

use App\Http\Requests\ResultRequest;
use App\Http\Requests\StudentRequest;
use App\Models\Batch;
use App\Models\Deportment;
use App\Models\Result;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ResultController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $batch_model = new Batch();
        $deportment_model = new Deportment();
        $batches = $batch_model->getBatches();
        $deportment = $deportment_model->getDeportment();
        return view('pages.result.index', compact('batches','deportment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $batch_model = new Batch();
        $deportment_model = new Deportment();
        $batches = $batch_model->getBatches();
        $deportment = $deportment_model->getDeportment();
        return view('pages.result.add', compact('batches','deportment'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
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
     * @param ResultRequest $request
     * @return Response
     */
    public function save(ResultRequest $request)
    {
        $result_model = new Result();
        $data = [];
        $data['batch_id'] = $request->input("batch");
        $data['deportment_id'] = $request->input("deportment");
        $data['student_id'] = $request->input("student_id");
        $data['subject_id'] = $request->input("subject_id");
        $data['exam_id'] = $request->input("exam_id");
        $data['mark'] = $request->input("mark");
        $insertId = $result_model->create($data);

        if($insertId)
        {
            return redirect('/result/create')->with('success', 'Updated Successfully..');
        }
        return redirect('/result/create')->with('Error', 'Error..');
    }

    /**
     * @param \Illuminate\Http\Request  $request
     * @return Response
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
     * @param Request $request
     * @return Response
     */
    public function destroy(Request $request)
    {
        $student_model = new Student();
        $id = $request->input("id");
        $student_model->deleteById($id);
        return redirect('/student')->with('success', 'Deleted successfully..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return Response
     */
    public function ajaxGetResult(Request $request) {
        $result_model = new Result();
        $batch = $request->input("batch");
        $deportment = $request->input("deportment");
        $student_id = $request->input("student_id");
        $exam_id = $request->input("exam_id");

        $result = $result_model->getResult($batch, $deportment, $student_id, $exam_id);
        if($result) {
            return Response::json(['result' => $result, 'message' => "success"], 200);
        }
        return Response::json(['result' => '', 'message' => 'error'], 200);
    }
}
