<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;
use Cviebrock\EloquentSluggable\Sluggable;


class Location extends Model
{
    protected $table = 'location';
    use HasFactory;
    use Sluggable;

    public $fillable = ['title','slug','status','created_at','updated_at','city_id','sequence','description'];

    public static function getLocationData(){
       $value=DB::table('location')->where(['location.status'=>'1'])
       ->join('city', 'city.id', '=', 'location.city_id')
       ->select(['location.*','city.title as city',DB::raw("(SELECT count(property.id) from property where property.location = location.id ) as total_property ")])->orderBy('location.id', 'asc')->get();
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

    // public static function getCategoryData(){
    //     $value=DB::table('categories')->where(['lang'=>Session::get('admin_lang')])->select(['categories.*',DB::raw("(SELECT categories_2.title FROM categories as categories_2 WHERE categories_2.id = categories.parent_id limit 1) as parent")])->orderBy('id', 'asc')->get();
    //     return $value;
    // }

}
