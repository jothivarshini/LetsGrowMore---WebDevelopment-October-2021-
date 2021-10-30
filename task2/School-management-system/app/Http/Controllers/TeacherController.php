<?php


namespace App\Http\Controllers;


use App\Http\Requests\TeacherRequest;
use App\Http\Requests\UserRequest;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_model = new User();
        $teachers = $user_model->getAllTeachers();
        return view('pages.teacher.index', compact('teachers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher_model = new Teacher();
        $teacher = $teacher_model->findById($id);
        return view('pages.teacher.edit', compact('teacher'));

    }

    /**
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(TeacherRequest $request)
    {
        $teacher_model = new Teacher();
        $id = $request->input("id");
        $data = [];
        $data['teacher_identity_number'] = $request->input("teacher_identity_number");
        $data['gender'] = $request->input("gender");
        $data['qualification'] = $request->input("qualification");
        $data['blood_group'] = $request->input("blood_group");
        $update = $teacher_model->updateDetail($data, $id);

        if($update)
        {
            return redirect('/teacher')->with('success', 'Updated Successfully..');
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
        $user_model = new User();
        $id = $request->input("id");
        if(Auth::user()->id == $id) {
            return redirect('/user')->with('error', 'Can\'t delete same user..');
        }die;
        $user_model->deleteById($id);
        return redirect('/user')->with('success', 'Deleted successfully..');
    }
}
