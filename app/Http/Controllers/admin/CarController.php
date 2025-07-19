<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Brand;
use App\Models\CarModel;
use App\Models\Style;
use App\Models\Variant;
use Illuminate\Support\Facades\File;
class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['result'] = Car::with(['brand','model'])->get();
        return view('admin.car.listing')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['brand'] = Brand::where(['status'=>'Active'])->get();
        $data['style'] = Style::where(['status'=>'Active'])->get();
        return view('admin.car.create')->with($data);
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
            'variant_id' => 'required',
            'style_id' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,webp|max:2048',
            ]);
            $file_name = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/car'), $file_name);
            Car::create([
                    'title'=>$request->title,
                    'brand_id'=>$request->brand_id,
                    'model_id'=>$request->model_id,
                    'variant_id'=>$request->variant_id,
                    'style_id'=>$request->style_id,
                    'image'=>$file_name,
                    'status'=>$request->status,
                    // 'sequence'=>$request->sequence
                ]);
            return redirect()->to('admin/car/listing')->with('success','Record Added Successfully !');
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
        $data['result'] = Car::find($id);
        $data['brand'] = Brand::where(['status'=>'Active'])->get();
        $data['style'] = Style::where(['status'=>'Active'])->get();
        $data['models'] = CarModel::where(['status'=>'Active','brand_id'=>$data['result']->brand_id])->get();
        $data['variant'] = Variant::where(['status'=>'Active','brand_id'=>$data['result']->brand_id,'model_id'=>$data['result']->model_id])->get();
        return view('admin.car.update')->with($data);
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
            'style_id' => 'required',
            'variant_id' => 'required',
            //'image' => 'mimes:png,jpg,jpeg,webp|max:2048',
            ]);
            if($request->hasFile('image')){
                $file_name = time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/car'), $file_name);
                File::delete(public_path('uploads/car/'.$request->old_img));
            }else{
                $file_name  = $request->old_img;
            }
            Car::find($id)->update([
                    'brand_id'=>$request->brand_id,
                    'model_id'=>$request->model_id,
                    'variant_id'=>$request->variant_id,
                    'style_id'=>$request->style_id,
                    'title'=>$request->title,
                    'image'=>$file_name,
                    'status'=>$request->status,
                    // 'sequence'=>$request->sequence
                ]);
        return redirect()->to('admin/car/listing')->with('success','Record Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Car::destroy($id);
        return redirect()->to('admin/car/listing')->with('success','Record Deleted successfully');
    }
}
