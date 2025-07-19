<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use DB;
use Session;
use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Property;
use App\Models\Projectstatus;
use App\Models\Builder;
use App\Models\Amenities;
use App\Models\City;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $FaqData = Property::getPropertyData();
        return view('admin.property.listing')->with("result",$FaqData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project_status = Projectstatus::getProjectstatusData();
        $builder = Builder::getBuilderData();
        $amenities = Amenities::getAmenitiesData();
        $city = City::getCItyData();
        return view('admin.property.create')->with(["property_status"=>$project_status,'builder'=>$builder,'amenities'=>$amenities,'city'=>$city]);
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
                $image = time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/property'), $image);
            }else{
                $image  = "";
            }
            if($request->hasFile('brochure')){
                $brochure = time().'.'.$request->brochure->extension();
                $request->brochure->move(public_path('uploads/property'), $brochure);
            }else{
                $brochure  = "";
            }   //implode(" ",$arr)
            
            $ins_data = Property::create([
                    'title'=>$request->title,
                    'slug'=>Str::slug($request->title), //$request->slug,
                    'type'=>$request->type ,
                    'price'=>$request->price ,
                    'price_sqft'=>$request->price_sqft ,
                    'area'=>$request->area ,
                    'rera_reg'=>$request->rera_reg ,
                    'overview'=>$request->overview ,
                    'video_url'=>$request->video_url ,
                    'map_url'=>$request->map_url ,
                    'video_url'=>$request->video_url ,
                    'city'=>$request->city ,
                    'location'=>$request->location ,
                    'amenities'=>(!empty($request->amenities))?implode(',',$request->amenities):'' ,
                    'key_highlights'=>(!empty($request->key_highlights))?implode(',',$request->key_highlights):'' ,
                    'location_advantage'=>(!empty($request->location_advantage))?implode(',',$request->location_advantage):'',
                    'property_status'=>$request->property_status,
                    'builder'=>$request->builder ,
                    'image'=>$image ,
                    'brochure'=>$brochure,
                    'short_overview' =>$request->short_overview,
                    'status'=>$request->status,
                    'filter_price' =>str_replace('.','',$request->filter_price),
                    'hot_property' =>$request->hot_property,
                    'new_launched' =>$request->new_launched,
                    'sequence' =>$request->sequence
                ]);
                if($request->hasfile('gallery'))
                {

                   foreach($request->file('gallery') as $image)
                   {
                       $imgData = array();
                       $file_name= time().$image->getClientOriginalName();
                       $image->move(public_path('uploads/property'), $file_name);
                       $imgData['image'] = $file_name;
                       $imgData['pro_id'] = $ins_data->id;
                       DB::table('tbl_property_gallery')->insert($imgData);
                   }
                }

                if(is_array($request->unit_type) && count($request->unit_type)>0)
                {
                    $unit_area = $request->unit_area;
                    $unit_price = $request->unit_price;
                   foreach($request->unit_type as $uk => $uv)
                   {
                       $unitData = array();
                       $unitData['pro_id'] = $ins_data->id;
                       $unitData['unit_type'] = $uv;
                       $unitData['unit_area'] = $unit_area[$uk];
                       $unitData['unit_price'] = $unit_price[$uk];
                       DB::table('tbl_property_price_list')->insert($unitData);
                   }
                }
                if(is_array($request->question) && count($request->question)>0)
                {
                    $que = $request->question;
                    $ans = $request->answer;
                   foreach($request->question as $qk => $qv)
                   {
                       $queData = array();
                       $queData['pro_id'] = $ins_data->id;
                       $queData['question'] = $qv;
                       $queData['answer'] = $ans[$qk];
                       DB::table('tbl_property_que_ans')->insert($queData);
                   }
                }
            return redirect()->to('admin/property/listing')->with('success','Record Added Successfully !');
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
        $PropertyData = Property::where(['id'=>$id])->first();
        $project_status = Projectstatus::getProjectstatusData();
        $builder = Builder::getBuilderData();
        $amenities = Amenities::getAmenitiesData();
        $city = City::getCItyData();
        $GalleryData = DB::table('tbl_property_gallery')->where(['pro_id'=>$id])->get();
        $unitPriceData = DB::table('tbl_property_price_list')->where(['pro_id'=>$id])->get();
        $QueAnsData = DB::table('tbl_property_que_ans')->where(['pro_id'=>$id])->get();
        $locationData = DB::table('location')->where(['city_id'=>$PropertyData->city])->get();
        return view('admin.property.update')->with(["result"=>$PropertyData,"property_status"=>$project_status,'builder'=>$builder,'amenities'=>$amenities,'city'=>$city,'gallery'=>$GalleryData,'unitPrice'=>$unitPriceData,'locationData'=>$locationData,'QueAnsData'=>$QueAnsData]);
    }

    public function get_location_data(Request $request)
    {
        $locationData = DB::table('location')->where(['city_id'=>$request->city_id])->orderBy("sequence", "ASC")->get();
        $sel_opt = "<option value=''>Please select</option>";
        if(!empty($locationData)){
            foreach($locationData as $location)
            {
                $sel_opt .= "<option value='".$location->id."'>".$location->title."</option>";
            }
        }
        echo $sel_opt;
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
            $image = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/property'), $image);
        }else{
            $image  = $request->old_img;
        }
        if($request->hasFile('brochure')){
            $brochure = time().'.'.$request->brochure->extension();
            $request->brochure->move(public_path('uploads/property'), $brochure);
        }else{
            $brochure  = $request->old_brochure;
        }
        //print_r($request->key_highlights); die;
        Property ::find($id)->update([
            'title'=>$request->title,
            'slug'=> $request->slug,
            'type'=>$request->type ,
            'price'=>$request->price ,
            'price_sqft'=>$request->price_sqft ,
            'area'=>$request->area ,
            'rera_reg'=>$request->rera_reg ,
            'overview'=>$request->overview ,
            'video_url'=>$request->video_url ,
            'map_url'=>$request->map_url ,
            'video_url'=>$request->video_url ,
            'city'=>$request->city ,
            'location'=>$request->location ,
            'amenities'=>(!empty($request->amenities))?implode(',',$request->amenities):'' ,
            'key_highlights'=>(!empty($request->key_highlights))?implode(',',$request->key_highlights):'' ,
            'property_status'=>$request->property_status ,
            'builder'=>$request->builder ,'image'=>$image ,
            'brochure'=>$brochure,
            'location_advantage'=>(!empty($request->location_advantage))?implode(',',$request->location_advantage):'',
            'status'=>$request->status,
            'short_overview' =>$request->short_overview,
            'filter_price' =>str_replace('.','',$request->filter_price),
            'hot_property' =>$request->hot_property,
            'new_launched' =>$request->new_launched,
            'sequence' =>$request->sequence
        ]);
        if($request->hasfile('gallery'))
                {

                   foreach($request->file('gallery') as $image)
                   {
                       $imgData = array();
                       $file_name= time().$image->getClientOriginalName();
                       $image->move(public_path('uploads/property'), $file_name);
                       $imgData['image'] = $file_name;
                       $imgData['pro_id'] = $id;
                       DB::table('tbl_property_gallery')->insert($imgData);
                   }
                }

                if(is_array($request->unit_type) && count($request->unit_type)>0)
                {
                    $unit_area = $request->unit_area;
                    $unit_price = $request->unit_price;
                   foreach($request->unit_type as $uk => $uv)
                   {
                       $unitData = array();
                       $unitData['pro_id'] = $id;
                       $unitData['unit_type'] = $uv;
                       $unitData['unit_area'] = $unit_area[$uk];
                       $unitData['unit_price'] = $unit_price[$uk];
                       DB::table('tbl_property_price_list')->insert($unitData);
                   }
                }
                if(is_array($request->question) && count($request->question)>0)
                {
                    $que = $request->question;
                    $ans = $request->answer;
                   foreach($request->question as $qk => $qv)
                   {
                       $queData = array();
                       $queData['pro_id'] = $id;
                       $queData['question'] = $qv;
                       $queData['answer'] = $ans[$qk];
                       DB::table('tbl_property_que_ans')->insert($queData);
                   }
                }
        return redirect()->to('admin/property/listing')->with('success','Record Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Property::destroy($id);
        DB::table('tbl_property_gallery')->where('pro_id', $id)->delete();
        DB::table('tbl_property_price_list')->where('pro_id', $id)->delete();
        DB::table('tbl_property_que_ans')->where('pro_id', $id)->delete();
        return redirect()->to('admin/property/listing')->with('success','Record Deleted successfully');
    }

    public function destroy_gallery($id,$pid)
    {
      
        // $p = DB::table('tbl_property_gallery')->where('id', $id)->get();
        // if(file_exists(public_path('uploads/property/'.$p->image)))
        // {
        //     File::delete(public_path('uploads/property/'.$p->image));
        // }
        DB::table('tbl_property_gallery')->where('id', $id)->delete();
        return redirect()->to('admin/property/edit/'.$pid)->with('success','Record Deleted successfully');
    }

    public function destroy_unit_data($id,$pid)
    {
        DB::table('tbl_property_price_list')->where('id', $id)->delete();
        return redirect()->to('admin/property/edit/'.$pid)->with('success','Record Deleted successfully');
    }

    public function destroy_que_ans_data($id,$pid)
    {
        DB::table('tbl_property_que_ans')->where('id', $id)->delete();
        return redirect()->to('admin/property/edit/'.$pid)->with('success','Record Deleted successfully');
    }
}
