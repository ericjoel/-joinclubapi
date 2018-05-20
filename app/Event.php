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

    public function isFull()
    {
        $hall = Hall::where('id', $this->hall_id)->first();
        $countMembers = $this->members()->count();

        return ($countMembers >= $hall->capacity);
    }

    public function addMember($user)
    {
        $this->members()->attach($user);
    }
}
