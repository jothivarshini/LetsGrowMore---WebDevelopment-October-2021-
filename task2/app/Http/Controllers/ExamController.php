<?php


namespace App\Http\Controllers;

use App\Http\Requests\ExamRequest;
use App\Models\Batch;
use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ExamController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exam_model = new Exam();
        $exams = $exam_model->getExams();
        return view('pages.exam.index', compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.exam.add');
    }

    /**
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(ExamRequest $request)
    {
        $exam_model = new Exam();
        $data = [];
        $data['name'] = $request->input("name");
        $insertId = $exam_model->create($data);

        if($insertId)
        {
            return redirect('/exam')->with('success', 'Inserted Successfully..');
        }
        return redirect('/exam')->with('success', 'Error..');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exam_model = new Exam();
        $exam = $exam_model->findById($id);
        return view('pages.exam.edit', compact('exam'));

    }

    /**
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(ExamRequest $request)
    {
        $exam_model = new Exam();
        $id = $request->input("id");
        $data = [];
        $data['name'] = $request->input("name");
        $update = $exam_model->updateDetail($data, $id);

        if($update)
        {
            return redirect('/exam')->with('success', 'Updated Successfully..');
        }
        return redirect('/exam')->with('Error', 'Failed To update..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $batch_model = new Batch();
        $id = $request->input("id");
        $batch_model->deleteById($id);
        return redirect('/batch')->with('success', 'Deleted successfully..');
    }

    public function getAllExam(Request $request)
    {
        $exam_model = new Exam();
        $result = $exam_model->getExams();
        if($result) {
            return Response::json(['result' => $result, 'message' => "success"], 200);
        }
        return Response::json(['result' => '', 'message' => 'error'], 200);
    }
}
