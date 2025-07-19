<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\File;
use App\Models\CarModel;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['result'] = Brand::get();
        return view('admin.brands.listing')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,webp|max:2048',
            ]);

            $file_name = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/brand'), $file_name);
            Brand::create([
                    'title'=>$request->title,
                    'image'=>$file_name,
                    'status'=>$request->status,
                   // 'sequence'=>$request->sequence
                ]);
            return redirect()->to('admin/brand/listing')->with('success','Record Added Successfully !');
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
    public function edit(int $id)
    {
        $data['result'] = Brand::find($id);
        return view('admin.brands.update')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'mimes:png,jpg,jpeg,webp|max:2048',
        ]);
        if($request->hasFile('image')){
            $file_name = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/brand'), $file_name);
            File::delete(public_path('uploads/brand/'.$request->old_img));
        }else{
            $file_name  = $request->old_img;
        }
        Brand::find($id)->update([
            'title'=>$request->title,
            'image'=>$file_name,
            'status'=>$request->status,
        ]);
        return redirect()->to('admin/brand/listing')->with('success','Record Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $model=CarModel::where('brand_id', '=', $id)->get();
        if($model->count()==0)
        {
            $brand = Brand::find($id);
            File::delete(public_path('uploads/brand/'.$brand->image));
            Brand::destroy($id);
            return redirect()->to('admin/brand/listing')->with('success','Record Deleted successfully');
        }else{
            return redirect()->to('admin/brand/listing')->with('danger','Delete <b>Model/Varient/Car</b> record first then delete brand');
        }
    }
}
