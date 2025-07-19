<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CareerJobs;
use Illuminate\Http\Request;

class CareerJobsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['result'] = CareerJobs::get();
        return view('admin.jobs.listing')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            ]);

            CareerJobs::create([
                    'title'=>$request->title,
                    'description'=>$request->description,
                    'status'=>$request->status,
                ]);
            return redirect()->to('admin/jobs/listing')->with('success','Record Added Successfully !');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['result'] = CareerJobs::find($id);
        return view('admin.jobs.update')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            ]);

            CareerJobs::find($id)->update([
                    'title'=>$request->title,
                    'description'=>$request->description,
                    'status'=>$request->status,
                ]);
        return redirect()->to('admin/jobs/listing')->with('success','Record Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        CareerJobs::destroy($id);
        return redirect()->to('admin/jobs/listing')->with('success','Record Deleted successfully');
    }
}
