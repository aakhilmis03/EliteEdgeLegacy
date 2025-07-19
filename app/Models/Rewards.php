<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Rewards extends Model
{
    use HasFactory;
    protected $table = 'rewards';
    public $fillable = ['id','image','created_at','updated_at'];

    public static function getRewardData(){
        $value=DB::table('rewards')->orderBy('id', 'asc')->get();
        return $value;
    }
}
