<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Rewards;
use Session;
use Illuminate\Support\Str;

class RewardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rewardData = Rewards::getRewardData();
        return view('admin.reward.index')->with("result",$rewardData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.reward.create');
    }

    public function edit($id)
    {
        $result = Rewards::find($id);
        return view('admin.reward.update',compact('result'));
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
       /* $request->validate([
             'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);*/

        if($request->hasFile('image')){
            $file_name = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/awards'), $file_name);
        }else{
            $file_name  = $request->old_img;
        }

        $slug = str_replace(' ', '-', strtolower($request->name));
        Rewards::find($id)->update([
            'image'=>$file_name,
        ]);

        return redirect()->to('reward/listing')->with('success','Record Updated Successfully!');
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
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            ]);

            $file_name = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/awards'), $file_name);
            Rewards::create([
                    'image'=>$file_name,
                ]);
            return redirect()->to('reward/listing')->with('success','Record Added Successfully !');
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
        $data = Rewards::destroy($id);
        return redirect()->to('reward/listing')->with('success','Record Deleted successfully');
    }
}
