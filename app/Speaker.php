<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;

class Speaker extends Model
{
    public function presentations()
    {
        return $this->belongsToMany(Presentation::class, 'presentation_speaker');
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
