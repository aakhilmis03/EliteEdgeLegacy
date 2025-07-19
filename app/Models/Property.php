<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;
use Cviebrock\EloquentSluggable\Sluggable;

class Property extends Model
{
    protected $table = 'property';
    use HasFactory;
    use Sluggable;

    public $fillable = ['title','slug','status','created_at','updated_at','type','price','price_sqft','area','rera_reg','overview','video_url','map_url','video_url','city','location','amenities','property_status','builder','image','brochure','location_advantage','short_overview','key_highlights','filter_price','hot_property','new_launched','sequence'];

    public static function getPropertyData(){
       //$value=DB::table('property')->where(['status'=>'1'])->select(['property.*'])->orderBy('id', 'asc')->get();
       $value=DB::table('property')->select(['property.*'])->orderBy('id', 'asc')->get();
       return $value;
    }


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

}
