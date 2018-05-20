<?php

namespace App\BusinessRules;

use App\Speaker;
use Illuminate\Support\Facades\DB;

class SpeakerCanMakeThePresentation
{
    public function __construct($speaker_id, $presentation_id)
    {
        $this->speaker_id = $speaker_id;
        $this->presentation_id = $presentation_id;
    }

    public function passes()
    {
        $speaker = Speaker::where('id', $this->speaker_id)->first();
        return $speaker->presentations()
                ->where('presentation_id', $this->presentation_id)
                ->exists();
    }

    public function message()
    {
        return 'Speaker can\'t make the selected presentation';
    }
}