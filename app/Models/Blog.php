<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    protected $fillable = ['id','category_id','title','slug','image','short_description','description','display_in','status','created_at','updated_at'];
}
