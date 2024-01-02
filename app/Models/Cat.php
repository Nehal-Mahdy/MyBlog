<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
class Cat extends Model
{
    use HasFactory;

    // protected $guarded=['_token'];
    
    protected $fillable=['name','img'];

    function posts(){
        return $this->hasMany(Post::class);
    }
}
