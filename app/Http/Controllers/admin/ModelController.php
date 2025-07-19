<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CarModel;
use App\Models\Brand;
class ModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['result'] = CarModel::with('brand')->get();
        return view('admin.models.listing')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['brand'] = Brand::where(['status'=>'Active'])->get();
        return view('admin.models.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'brand_id' => 'required',
            ]);

            CarModel::create([
                    'title'=>$request->title,
                    'brand_id'=>$request->brand_id,
                    'status'=>$request->status,
                ]);
            return redirect()->to('admin/model/listing')->with('success','Record Added Successfully !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['brand'] = Brand::where(['status'=>'Active'])->get();
        $data['result'] = CarModel::find($id);
        return view('admin.models.update')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'brand_id' => 'required',
            ]);

            CarModel::find($id)->update([
                    'title'=>$request->title,
                    'brand_id'=>$request->brand_id,
                    'status'=>$request->status,
                    // 'sequence'=>$request->sequence
                ]);
        return redirect()->to('admin/model/listing')->with('success','Record Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        CarModel::destroy($id);
        return redirect()->to('admin/model/listing')->with('success','Record Deleted successfully');
    }
}
