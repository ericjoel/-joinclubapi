<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    public function presentations()
    {
        return $this->belongsToMany(Presentation::class, 'presentation_speaker');
    }
}
