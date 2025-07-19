<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\NewsUpdate;
use App\Models\Category;
use Session;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
class NewsUpdateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public  $lang = '';
    function __construct(){
        //$this->lang = Session::get('admin_lang');
    }

    public function index()
    {
        $ItemData = DB::table('news_update')->orderBy('id', 'asc')->get();
        return view('admin.news_update.listing')->with("result",$ItemData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news_update.create');
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
            'description' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,avi,webp|max:2048',
            ]);

            $file_name = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/news_update'), $file_name);
            $ins_data =  NewsUpdate::create([
                    'title'=>$request->title,
                    'image'=>$file_name,
                    'description'=>$request->description,
                    'slug'=>"Str::slug($request->title, '-')",
                    'status'=>$request->status
                ]);
            return redirect()->to('admin/news_update/listing')->with('success','Record Added Successfully !');
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
        $NewsData = NewsUpdate::where(['id'=>$id])->first();
        return view('admin.news_update.update')->with(["result"=>$NewsData]);
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
        //dd($_FILES); die;
        $request->validate([
            'title' => 'required',
            'image' => 'mimes:png,jpg,jpeg,avi,webp|max:2048',
        ]);
        if($request->hasFile('image')){
            $file_name = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/news_update'), $file_name);
        }else{
            $file_name  = $request->old_img;
        }
        NewsUpdate::find($id)->update([
                    'title'=>$request->title,
                    'slug'=>Str::slug($request->title, '-'),
                    'image'=>$file_name,
                    'description'=>$request->description,
                    'status'=>$request->status
        ]);

        return redirect()->to('admin/news_update/listing')->with('success','Record Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = NewsUpdate::destroy($id);
        return redirect()->to('admin/news_update/listing')->with('success','Record Deleted successfully');
    }


}
