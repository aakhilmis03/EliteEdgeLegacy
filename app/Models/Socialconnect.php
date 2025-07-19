<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Socialconnect extends Model
{
    use HasFactory;
    protected $table = 'socialconnect';
    public $fillable = ['title','image','description','created_at','updated_at'];

    public static function getServiceData(){
        $value=DB::table('socialconnect')->orderBy('id', 'asc')->get();
        return $value;
    }
}
