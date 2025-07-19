<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class NewsUpdate extends Model
{
    protected $table = 'news_update';
    use HasFactory;
    public $fillable = ['title','status','slug','short_description','description','image','created_at','updated_at'];

    public static function getNewsData(){
        $value=DB::table('news_update')->orderBy('id', 'asc')->get();
        return $value;
    }
}




