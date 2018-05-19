<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presentation extends Model
{
    public function speakers()
    {
        return $this->belongsToMany(Speaker::class);
    }
}
