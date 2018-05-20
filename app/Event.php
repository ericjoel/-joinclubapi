<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['date_event', 'start_hour', 'finish_hour', 'hall_id', 'speaker_id', 'presentation_id'];
    
    public function members()
    {
        return $this->belongsToMany(User::class);
    }
}
