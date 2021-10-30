<?php


namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use Auth;
class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_model = new User();
        $users = $user_model->getUsers();
        return view('pages.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.user.add');
    }

    /**
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(UserRequest $request)
    {
        $user_model = new User();
        $admin_model = new Admin();
        $teacher_model = new Teacher();
        $student_model = new Student();
        $data = [];
        $data['name'] = $request->input("name");
        $data['type'] = $request->input("type");
        $data['email'] = $request->input("email");
        $data['password'] = Hash::make($request->input("password"));
        $insertId = $user_model->create($data);
        switch ($data['type']) {
            case "1":
                $admin_model->create($insertId);
                break;
            case "2":
                $teacher_model->create($insertId);
                break;
            case "3":
                $student_model->create($insertId);
                break;
        }
        if($insertId)
        {
            return redirect('/user')->with('success', 'Inserted Successfully..');
        }
        return redirect('/user')->with('success', 'Error..');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_model = new User();
        $user = $user_model->findById($id);
        return view('pages.user.edit', compact('user'));

    }

    /**
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request)
    {
        $user_model = new User();
        $id = $request->input("id");
        $data = [];
        $data['name'] = $request->input("name");
        $data['type'] = $request->input("type");
        $data['email'] = $request->input("email");
        $update = $user_model->updateDetail($data, $id);

        if($update)
        {
            return redirect('/user')->with('success', 'Updated Successfully..');
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
        }
        $user_model->deleteById($id);
        return redirect('/user')->with('success', 'Deleted successfully..');
    }
}
