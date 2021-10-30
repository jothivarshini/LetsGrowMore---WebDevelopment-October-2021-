<?php


namespace App\Http\Controllers;

use App\Http\Requests\BatchRequest;
use App\Models\Batch;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Auth;
class BatchController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batch_model = new Batch();
        $batches = $batch_model->getBatches();
        return view('pages.batch.index', compact('batches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.batch.add');
    }

    /**
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(BatchRequest $request)
    {
        $batch_model = new Batch();
        $data = [];
        $data['name'] = $request->input("name");
        $insertId = $batch_model->create($data);

        if($insertId)
        {
            return redirect('/batch')->with('success', 'Inserted Successfully..');
        }
        return redirect('/batch')->with('success', 'Error..');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $batch_model = new Batch();
        $batch = $batch_model->findById($id);
        return view('pages.batch.edit', compact('batch'));

    }

    /**
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(BatchRequest $request)
    {
        $batch_model = new Batch();
        $id = $request->input("id");
        $data = [];
        $data['name'] = $request->input("name");
        $update = $batch_model->updateDetail($data, $id);

        if($update)
        {
            return redirect('/batch')->with('success', 'Updated Successfully..');
        }
        return redirect('/batch')->with('Error', 'Failed To update..');
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
}
