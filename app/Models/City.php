<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;
use Cviebrock\EloquentSluggable\Sluggable;


class City extends Model
{
    protected $table = 'city';
    use HasFactory;
    use Sluggable;

    public $fillable = ['title','slug','status','created_at','updated_at','image','description'];

    public static function getCityData(){
       $value=DB::table('city')->where(['status'=>'1'])->select(['city.*'])->orderBy('id', 'asc')->get();
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
