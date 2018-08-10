<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
         'category_id',
         'title',
         'author',
         'description',
         'image',
    ];


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function marks()
    {
        return $this->hasMany(Mark::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
