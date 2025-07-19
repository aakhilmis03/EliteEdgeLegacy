<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class EnquiryController extends Controller
{
    /* start custom requirement */
    public function property_enquiry()
    {
        $data['result'] = DB::table('enquiry')->get();
        return view('admin.enquiry.enquiry_listing')->with($data);
    }

    public function job_enquiry()
    {
        $data['result'] = DB::table('enquiry_jobs')->get();
        return view('admin.enquiry.jobs_enquiry_listing')->with($data);
    }
}
