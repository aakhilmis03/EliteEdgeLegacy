<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Lifeatelitepro;
use Session;
use Illuminate\Support\Str;

class LifeateliteproController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bannerData = Lifeatelitepro::getLifeateliteproData();
        return view('admin.lifeatelitepro.index')->with("result",$bannerData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lifeatelitepro.create');
    }

    public function edit($id)
    {
        $result = Lifeatelitepro::find($id);
        return view('admin.lifeatelitepro.update',compact('result'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id , Request $request)
    {
        $request->validate([
            'title' => 'required',
            // 'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        if($request->hasFile('image')){
            $file_name = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/lifeatelitepro'), $file_name);
        }else{
            $file_name  = $request->old_img;
        }

        $slug = str_replace(' ', '-', strtolower($request->name));
        Lifeatelitepro::find($id)->update([
            'image'=>$file_name,
            'title'=>$request->title,
            'description'=>$request->description,
            'status'=>$request->status,
        ]);

        return redirect()->to('lifeatelitepro/listing')->with('success','Record Updated Successfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            ]);

            $file_name = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/lifeatelitepro'), $file_name);
            Lifeatelitepro::create([
                    'image'=>$file_name,
                    'title'=>$request->title,
                    'description'=>$request->description,
                    'status'=>$request->status,
                ]);
            return redirect()->to('lifeatelitepro/listing')->with('success','Record Added Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Lifeatelitepro::destroy($id);
        return redirect()->to('lifeatelitepro/listing')->with('success','Record Deleted successfully');
    }
}
