<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metatag extends Model
{
    use HasFactory;
    protected $table = 'metatags';
    protected $fillable = ['id','url','title','keyword','description','created_at','updated_at'];
}
