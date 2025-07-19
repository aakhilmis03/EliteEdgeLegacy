<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Metatag;
use Illuminate\Http\Request;

class MetatagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['result'] = Metatag::get();
        return view('admin.metatag.listing')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.metatag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required|unique:metatags,url',
            'title' => 'required',
            ]);

            Metatag::create([
                    'title'=>$request->title,
                    'url'=>$request->url,
                    'keyword'=>$request->keyword,
                    'description'=>$request->description,
                ]);
            return redirect()->to('admin/metatag/listing')->with('success','Record Added Successfully !');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['result'] = Metatag::find($id);
        return view('admin.metatag.update')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'url' => 'required',
            'title' => 'required',
            ]);

            Metatag::find($id)->update([
                    'title'=>$request->title,
                    'url'=>$request->url,
                    'keyword'=>$request->keyword,
                    'description'=>$request->description,
                ]);
        return redirect()->to('admin/metatag/listing')->with('success','Record Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Metatag::destroy($id);
        return redirect()->to('admin/metatag/listing')->with('success','Record Deleted successfully');
    }
}
