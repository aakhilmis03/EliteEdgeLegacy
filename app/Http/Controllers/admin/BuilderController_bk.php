<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\Builder;
use Session;
use Cviebrock\EloquentSluggable\Services\SlugService;

class BuilderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $FaqData = Builder::getBuilderData();
        return view('admin.builder.index')->with("result",$FaqData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.builder.create')->with("builder");
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
            ]);
            if($request->hasFile('image')){
                $file_name = time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/builder'), $file_name);
            }else{
                $file_name  = "";
            }
            Builder::create([
                    'title'=>$request->title,
                    'image'=>$file_name,
                    'description'=>$request->description,
                    'location'=>$request->location,
                    'mobile'=>$request->mobile,
                    'office'=>$request->office,
                    'email'=>$request->email,
                    'skype'=>$request->skype,
                    'license'=>$request->license,
                    'slug'=> SlugService::createSlug(Builder::class, 'slug', $request->title),
                    'status'=>$request->status
                ]);
            return redirect()->to('builder/listing')->with('success','Record Added Successfully !');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $BuilderData = Builder::where(['id'=>$id])->first();
        return view('admin.builder.update')->with(["result"=>$BuilderData]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);
        if($request->hasFile('image')){
            $file_name = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/builder'), $file_name);
        }else{
            $file_name  = $request->old_img;
        }
        Builder ::find($id)->update([
            'title'=>$request->title,
            'image'=>$file_name,
            'description'=>$request->description,
            'location'=>$request->location,
            'mobile'=>$request->mobile,
            'office'=>$request->office,
            'email'=>$request->email,
            'skype'=>$request->skype,
            'license'=>$request->license,
            'status'=>$request->status,
        ]);
        return redirect()->to('builder/listing')->with('success','Record Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Builder::destroy($id);
        return redirect()->to('builder/listing')->with('success','Record Deleted successfully');
    }
}
