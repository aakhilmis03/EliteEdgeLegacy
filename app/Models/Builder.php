<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;
use App\Models\Product;
use Cviebrock\EloquentSluggable\Sluggable;


class Builder extends Model
{
    protected $table = 'builders';
    use HasFactory;
    use Sluggable;

    public $fillable = ['title','slug','status','created_at','updated_at','description','location','mobile','office','email','skype','license','image','display_home'];

    public static function getBuilderData(){
       $value=DB::table('builders')->where(['status'=>'1'])->select(['builders.*',DB::raw("(SELECT count(property.id) from property where property.builder = builders.id ) as total_property ")])->orderBy('id', 'asc')->get();
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
