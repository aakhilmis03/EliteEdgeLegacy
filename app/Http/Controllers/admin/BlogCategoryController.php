<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['result'] = BlogCategory::get();
        return view('admin.blog_category.listing')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog_category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            ]);

            BlogCategory::create([
                    'title'=>$request->title,
                    'slug'=>Str::slug($request->title),
                    'status'=>$request->status,
                ]);
            return redirect()->to('admin/blog_category/listing')->with('success','Record Added Successfully !');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['result'] = BlogCategory::find($id);
        return view('admin.blog_category.update')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            ]);

            BlogCategory::find($id)->update([
                    'title'=>$request->title,
                    'slug'=>Str::slug($request->title),
                    'status'=>$request->status,
                ]);
        return redirect()->to('admin/blog_category/listing')->with('success','Record Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        BlogCategory::destroy($id);
        return redirect()->to('admin/blog_category/listing')->with('success','Record Deleted successfully');
    }
}
