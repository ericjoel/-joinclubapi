<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;

class Hall extends Model
{
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
