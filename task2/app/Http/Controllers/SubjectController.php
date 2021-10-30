<?php


namespace App\Http\Controllers;

use App\Http\Requests\SubjectRequest;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class SubjectController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subject_model = new Subject();
        $subjects = $subject_model->getSubjects();
        return view('pages.subject.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.subject.add');
    }

    /**
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(SubjectRequest $request)
    {
        $batch_model = new Subject();
        $data = [];
        $data['name'] = $request->input("name");
        $data['subject_code'] = $request->input("subject_code");
        $insertId = $batch_model->create($data);

        if($insertId)
        {
            return redirect('/subject')->with('success', 'Inserted Successfully..');
        }
        return redirect('/subject')->with('success', 'Error..');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject_model = new Subject();
        $subject = $subject_model->findById($id);
        return view('pages.subject.edit', compact('subject'));

    }

    /**
     * @param SubjectRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(SubjectRequest $request)
    {
        $subject_model = new Subject();
        $id = $request->input("id");
        $data = [];
        $data['name'] = $request->input("name");
        $data['subject_code'] = $request->input("subject_code");
        $update = $subject_model->updateDetail($data, $id);

        if($update)
        {
            return redirect('/subject')->with('success', 'Updated Successfully..');
        }
        return redirect('/subject')->with('Error', 'Failed To update..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $subject_model = new Subject();
        $id = $request->input("id");
        $subject_model->deleteById($id);
        return redirect('/subject')->with('success', 'Deleted successfully..');
    }

    public function getAllSubject(Request $request)
    {
        $subject_model = new Subject();
        $result = $subject_model->getSubjects();
        if($result) {
            return Response::json(['result' => $result, 'message' => "success"], 200);
        }
        return Response::json(['result' => '', 'message' => 'error'], 200);
    }
}
