<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['date_event', 'start_hour', 'finish_hour'];
    
    public function members()
    {
        return $this->belongsToMany(User::class);
    }
}
