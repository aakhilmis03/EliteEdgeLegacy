<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\City;
use Session;
use Cviebrock\EloquentSluggable\Services\SlugService;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $FaqData = City::getCityData();
        return view('admin.city.listing')->with("result",$FaqData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.city.create')->with("city");
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
            'image' => 'required|mimes:png,jpg,jpeg,webp|max:2048'
            ]);
            $file_name = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/city'), $file_name);
            City::create([
                    'title'=>$request->title,
                    'description'=>$request->description,
                    'image'=>$file_name,
                    'slug'=> SlugService::createSlug(City::class, 'slug', $request->title),
                    'status'=>$request->status
                ]);
            return redirect()->to('admin/city/listing')->with('success','Record Added Successfully !');
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
        $CityData = City::where(['id'=>$id])->first();
        return view('admin.city.update')->with(["result"=>$CityData]);
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
            'image' => 'mimes:png,jpg,jpeg,webp|max:2048'
        ]);
        if($request->hasFile('image')){
            $file_name = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/city'), $file_name);
        }else{
            $file_name  = $request->old_img;
        }
        //print_r($request->hasFile('image')); die;
        City ::find($id)->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$file_name,
            'status'=>$request->status,
        ]);
        return redirect()->to('admin/city/listing')->with('success','Record Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = City::destroy($id);
        return redirect()->to('admin/city/listing')->with('success','Record Deleted successfully');
    }
}
