<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Variant;
use App\Models\Brand;
use App\Models\CarModel;
class VariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['result'] = Variant::with(['brand','model'])->get();
        return view('admin.variant.listing')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['brand'] = Brand::where(['status'=>'Active'])->get();
        //$data['models'] = Brand::where(['status'=>'Active'])->get();
        return view('admin.variant.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'brand_id' => 'required',
            'model_id' => 'required',
            ]);

            Variant::create([
                    'title'=>$request->title,
                    'brand_id'=>$request->brand_id,
                    'model_id'=>$request->model_id,
                    'status'=>$request->status,
                    // 'sequence'=>$request->sequence
                ]);
            return redirect()->to('admin/variant/listing')->with('success','Record Added Successfully !');
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
        $data['result'] = Variant::find($id);
        $data['brand'] = Brand::where(['status'=>'Active'])->get();
        $data['models'] = CarModel::where(['status'=>'Active','brand_id'=>$data['result']->brand_id])->get();
        return view('admin.variant.update')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'brand_id' => 'required',
            'model_id' => 'required',
            ]);

            Variant::find($id)->update([
                    'title'=>$request->title,
                    'brand_id'=>$request->brand_id,
                    'model_id'=>$request->model_id,
                    'status'=>$request->status,
                    // 'sequence'=>$request->sequence
                ]);
        return redirect()->to('admin/variant/listing')->with('success','Record Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Variant::destroy($id);
        return redirect()->to('admin/variant/listing')->with('success','Record Deleted successfully');
    }
}
