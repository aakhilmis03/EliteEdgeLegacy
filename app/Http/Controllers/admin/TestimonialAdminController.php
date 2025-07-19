<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class TestimonialAdminController extends Controller
{
    public function index()
    {
        $data['result'] = Testimonial::get();
        return view('admin.testimonial.listing')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonial.create');
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
            $request->image->move(public_path('uploads/testimonial'), $file_name);
            Testimonial::create([
                    'title'=>$request->title,
                    'image'=>$file_name,
                    'status'=>$request->status,
                   // 'sequence'=>$request->sequence
                ]);
            return redirect()->to('admin/testimonial/listing')->with('success','Record Added Successfully !');
    }
     /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $data['result'] = Testimonial::find($id);
        return view('admin.testimonial.update')->with($data);
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
            $request->image->move(public_path('uploads/testimonial'), $file_name);
            File::delete(public_path('uploads/testimonial/'.$request->old_img));
        }else{
            $file_name  = $request->old_img;
        }
        Testimonial::find($id)->update([
            'title'=>$request->title,
            'image'=>$file_name,
            'status'=>$request->status,
        ]);
        return redirect()->to('admin/testimonial/listing')->with('success','Record Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        Testimonial::destroy($id);
        return redirect()->to('admin/testimonial/listing')->with('success','Record Deleted successfully');
    }
}
