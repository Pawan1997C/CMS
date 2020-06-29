<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['avatar', 'user_id', 'youtube', 'facebook'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
