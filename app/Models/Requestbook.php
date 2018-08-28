<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Requestbook extends Model
{
    protected $fillable = [
         'user_id',
         'title',
         'author',
         'description',
         'status',
    ];

    protected $appends = [
        'StatusText',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusTextAttribute()
    {
        if ($this->status == '0')
            return 'pending';
        elseif ($this->status == '1')
            return 'accepted';
        else
            return 'rejected';
    }
}
