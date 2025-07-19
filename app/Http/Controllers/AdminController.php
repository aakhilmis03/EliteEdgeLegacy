<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    public function changePassword()
    {
        return view('admin.change-password');
    }
    public function updatePassword(Request $postdata)
    {
        $postdata->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password'
        ]);
        $user = User::find(1);
        $old_password = $postdata->input('old_password');
        if (Hash::check($old_password, $user->password)) {
            $user->update([
                'password' => Hash::make($postdata->new_password)
            ]);
            return redirect()->to('change-password')->with('success','Your password has been updated successfully.');
        }else{
            return redirect()->to('change-password')->with('error','Current password not matched. please try again!');
        }
    }

    public function listing()
    {
        $data['result'] = User::where('id', '!=', 1)->get();
        return view('admin.user.listing')->with($data);
    }
     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'pwd' => 'required|min:6',
            'cpwd' => 'required|same:pwd'
            ]);

            User::create([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'password' => Hash::make($request->pwd),
                    'raw_password' => $request->pwd,
                    'user_type' => 2,
                    'status'=>$request->status,
                ]);
            return redirect()->to('admin/user/listing')->with('success','Record Added Successfully !');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $data['result'] = User::find($id);
        return view('admin.user.update')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation_array = [
            'name' => 'required',
             'email' => 'required',
        ];
        if(!empty($request->pwd))
        {
            $validation_array = array_merge($validation_array,['pwd' => 'required|min:6','cpwd' => 'required|same:pwd']);
        }
        $request->validate($validation_array);
        
        $update_array = [
            'name'=>$request->name,
            'email'=>$request->email,
            //'password' => Hash::make($request->pwd),
            //'raw_password' => $request->pwd,
            'status'=>$request->status,
        ];

        if(!empty($request->pwd))
        {
            $update_array = array_merge($update_array,['password' =>Hash::make($request->pwd),'raw_password' =>$request->pwd]);
        }
        User::find($id)->update($update_array);
        return redirect()->to('admin/user/listing')->with('success','Record Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        User::destroy($id);
        return redirect()->to('admin/user/listing')->with('success','Record Deleted successfully');
    }
}
