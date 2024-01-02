<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Cat;
use App\Models\User;
use Illuminate\Database\Eloquent\Prunable;

class Post extends Model
{
    use HasFactory, SoftDeletes, Prunable;
    protected $fillable=['title','content','version','description','img','cat_id','user_id'];

    function cat(){
        return $this->belongsto(Cat::class);
    }
    function user(){
        return $this->belongsto(User::class);
    }
    function prunable(){
        return static::where('created_at','<=', now()->subWeek());
    }

    // function softDelete(){
    // $post->delete();
    // }
}