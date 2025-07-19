<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AjaxController extends Controller
{


     public function getLocationByCity(Request $request)
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
}
