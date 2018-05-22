<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;

class Presentation extends Model
{
    public function speakers()
    {
        return $this->belongsToMany(Speaker::class, 'presentation_speaker');
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
