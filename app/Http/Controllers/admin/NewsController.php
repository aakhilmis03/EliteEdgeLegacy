<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\News;
use App\Models\Category;
use Session;
use Illuminate\Support\Str;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public  $lang = '';
    function __construct(){
        $this->lang = Session::get('admin_lang');
    }

    public function index()
    {
        $ItemData = DB::table('news')->orderBy('id', 'asc')->get();
        return view('admin.news.index')->with("result",$ItemData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $CategoryData = Category::where(['status'=>'1'])->get();
        return view('admin.news.create')->with("category",$CategoryData);
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
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            ]);

            $file_name = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/news'), $file_name);
            $ins_data =  News::create([
                    'title'=>$request->title,
                    'image'=>$file_name,
                    //"short_description"=>$request->short_description,
                    'description'=>$request->description,
                    'slug'=>Str::slug($request->title, '-'),
                    'status'=>$request->status
                ]);
            return redirect()->to('news/listing')->with('success','Record Added Successfully !');
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
        $NewsData = News::where(['id'=>$id])->first();
        $CategoryData = Category::where(['status'=>'1'])->get();
        return view('admin.news.update')->with(["result"=>$NewsData, "category"=>$CategoryData]);
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
            'image' => 'mimes:png,jpg,jpeg|max:2048',
        ]);
        if($request->hasFile('image')){
            $file_name = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/news'), $file_name);
        }else{
            $file_name  = $request->old_img;
        }
        News::find($id)->update([
                    'title'=>$request->title,
                    'slug'=>Str::slug($request->title, '-'),
                    'image'=>$file_name,
                    //"short_description"=>$request->short_description,
                    'description'=>$request->description,
                    'status'=>$request->status
        ]);

        return redirect()->to('news/listing')->with('success','Record Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = News::destroy($id);
        return redirect()->to('news/listing')->with('success','Record Deleted successfully');
    }


}
