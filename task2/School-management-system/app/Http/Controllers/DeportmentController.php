<?php


namespace App\Http\Controllers;

use App\Http\Requests\DeportmentRequest;
use App\Models\Deportment;
use Illuminate\Http\Request;
use Auth;
class DeportmentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deportment_model = new Deportment();
        $deportment = $deportment_model->getDeportment();
        return view('pages.deportment.index', compact('deportment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.deportment.add');
    }

    /**
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(DeportmentRequest $request)
    {
        $deportment_model = new Deportment();
        $data = [];
        $data['name'] = $request->input("name");
        $insertId = $deportment_model->create($data);

        if($insertId)
        {
            return redirect('/deportment')->with('success', 'Inserted Successfully..');
        }
        return redirect('/deportment')->with('success', 'Error..');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $deportment_model = new Deportment();
        $deportment = $deportment_model->findById($id);
        return view('pages.deportment.edit', compact('deportment'));

    }

    /**
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(DeportmentRequest $request)
    {
        $deportment_model = new Deportment();
        $id = $request->input("id");
        $data = [];
        $data['name'] = $request->input("name");
        $update = $deportment_model->updateDetail($data, $id);

        if($update)
        {
            return redirect('/deportment')->with('success', 'Updated Successfully..');
        }
        return redirect('/deportment')->with('Error', 'Failed To update..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $deportment_model = new Deportment();
        $id = $request->input("id");
        $deportment_model->deleteById($id);
        return redirect('/deportment')->with('success', 'Deleted successfully..');
    }
}
