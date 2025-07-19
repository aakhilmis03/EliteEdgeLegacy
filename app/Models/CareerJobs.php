<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerJobs extends Model
{
    use HasFactory;
    protected $table = 'career_jobs';
    protected $fillable = ['id','title','status','description','created_at','updated_at'];
}
