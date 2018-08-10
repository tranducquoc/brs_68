<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = [
         'user_id',
         'title',
         'author',
         'description',
         'status',
     ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
