<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\Amenities;
use Session;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AmenitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $FaqData = Amenities::getAmenitiesData();
        return view('admin.amenities.listing')->with("result",$FaqData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.amenities.create')->with("amenities");
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
                $request->image->move(public_path('uploads/amenities'), $file_name);
            }else{
                $file_name  = "";
            }
            Amenities::create([
                    'title'=>$request->title,
                    'slug'=> SlugService::createSlug(Amenities::class, 'slug', $request->title),
                    'image'=>$file_name,
                    'status'=>$request->status
                ]);
            return redirect()->to('admin/amenities/listing')->with('success','Record Added Successfully !');
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
        $AmenitiesData = Amenities::where(['id'=>$id])->first();
        return view('admin.amenities.update')->with(["result"=>$AmenitiesData]);
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
            $request->image->move(public_path('uploads/amenities'), $file_name);
        }else{
            $file_name  = $request->old_img;
        }
        Amenities ::find($id)->update([
            'title'=>$request->title,
            'image'=> $file_name,
            'status'=>$request->status,
        ]);
        return redirect()->to('admin/amenities/listing')->with('success','Record Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Amenities::destroy($id);
        return redirect()->to('admin/amenities/listing')->with('success','Record Deleted successfully');
    }
}
