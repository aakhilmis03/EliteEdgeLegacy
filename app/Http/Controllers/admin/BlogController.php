<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['result'] = Blog::get();
        return view('admin.blog.listing')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['category'] = BlogCategory::get();
        return view('admin.blog.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,webp|max:2048',
            'description'=>'required',
            'short_description'=>'required',
            'display_in'=>'required',
            ]);
            $file_name = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/blog'), $file_name);
            Blog::create([
                    'category_id' =>$request->category_id,
                    'title'=>$request->title,
                    'slug'=>Str::slug($request->title),
                    'image'=>$file_name,
                    'short_description'=>$request->short_description,
                    'description'=>$request->description,
                    'display_in'=>implode(',',$request->display_in),
                    'status'=>$request->status,
                ]);
            return redirect()->to('admin/blog/listing')->with('success','Record Added Successfully !');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['result'] = Blog::find($id);
        $data['category'] = BlogCategory::get();
        return view('admin.blog.update')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'description'=>'required',
            'short_description'=>'required',
            'display_in'=>'required',
            ]);
            if($request->hasFile('image')){
                $file_name = time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/blog'), $file_name);
                File::delete(public_path('uploads/blog/'.$request->old_img));
            }else{
                $file_name  = $request->old_img;
            }
            Blog::find($id)->update([
                    'category_id' =>$request->category_id,
                    'title'=>$request->title,
                    'slug'=>Str::slug($request->title),
                    'image'=>$file_name,
                    'short_description'=>$request->short_description,
                    'description'=>$request->description,
                    'display_in'=>implode(',',$request->display_in),
                    'status'=>$request->status,
                ]);
        return redirect()->to('admin/blog/listing')->with('success','Record Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Blog = Blog::find($id);
        File::delete(public_path('uploads/blog/'.$Blog->image));
        Blog::destroy($id);
        return redirect()->to('admin/blog/listing')->with('success','Record Deleted successfully');
    }
}
