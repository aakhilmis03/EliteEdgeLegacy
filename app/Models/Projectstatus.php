<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;
use Cviebrock\EloquentSluggable\Sluggable;


class Projectstatus extends Model
{
    protected $table = 'project_status';
    use HasFactory;
    use Sluggable;

    public $fillable = ['title','slug','status','created_at','updated_at'];

    public static function getProjectstatusData(){
       $value=DB::table('project_status')->where(['status'=>'1'])->select(['project_status.*',DB::raw("(SELECT count(property.id) from property where property.property_status = project_status.id ) as total_property ")])->orderBy('id', 'asc')->get();
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
