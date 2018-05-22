<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Hall;
use App\User;
use App\Speaker;
use App\Presentation;
class Event extends Model
{
    protected $fillable = ['date_event', 'start_hour', 'finish_hour', 'hall_id', 'speaker_id', 'presentation_id'];
    
    public function members()
    {
        return $this->belongsToMany(User::class);
    }

    public function hall() 
    {
        return $this->belongsTo(Hall::class);
    }

    public function presentation() 
    {
        return $this->belongsTo(Presentation::class);
    }


    public function speaker() 
    {
        return $this->belongsTo(Speaker::class);
    }


    public function isFull()
    {
        // $hall = Hall::where('id', $this->hall_id)->first();
        $countMembers = $this->members()->count();

        return ($countMembers >= $this->capacity);
    }

    public function addMember($user)
    {
        $this->members()->attach($user);
    }
}
