<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\Location;
use App\Models\City;
use Session;
use Cviebrock\EloquentSluggable\Services\SlugService;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $LocationData = Location::getLocationData();
        return view('admin.location.listing')->with(["result"=>$LocationData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cityData = City::where(['status'=>'1'])->get();
        //print_r($cityData); die;
        return view('admin.location.create')->with(["city"=>$cityData]);
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

            Location::create([
                    'title'=>$request->title,
                    'city_id'=>$request->city_id,
                    'sequence'=>$request->sequence,
                    'description'=>$request->description,
                    'slug'=> SlugService::createSlug(Location::class, 'slug', $request->title),
                    'status'=>$request->status
                ]);
            return redirect()->to('admin/location/listing')->with('success','Record Added Successfully !');
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
        $LocationData = Location::where(['id'=>$id])->first();
        $cityData = City::where(['status'=>'1'])->get();
        return view('admin.location.update')->with(["result"=>$LocationData,'city'=>$cityData]);
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
        Location ::find($id)->update([
            'title'=>$request->title,
            'city_id'=>$request->city_id,
            'sequence'=>$request->sequence,
            'description'=>$request->description,
            'status'=>$request->status,
        ]);
        return redirect()->to('admin/location/listing')->with('success','Record Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Location::destroy($id);
        return redirect()->to('admin/location/listing')->with('success','Record Deleted successfully');
    }
}
