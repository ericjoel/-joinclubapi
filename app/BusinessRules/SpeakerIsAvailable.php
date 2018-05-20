<?php

namespace App\BusinessRules;

use Illuminate\Support\Facades\DB;

class SpeakerIsAvailable 
{
    public function __construct($speaker_id, $date_event, $start_hour, $finish_hour)
    {
        $this->speaker_id = $speaker_id;
        $this->date_event = $date_event;
        $this->start_hour = $start_hour;
        $this->finish_hour = $finish_hour;
    }

    public function passes()
    {
        return DB::table('events')
        ->where([
            ['date_event', $this->date_event],
            ['speaker_id', $this->speaker_id]
        ])
        ->where(function ($query) {
            $query->where([
                ['start_hour', '<=', $this->finish_hour],
                ['finish_hour', '>=', $this->start_hour]
            ]);
        })
        ->doesntExist();
    }

    public function message()
    {
        return 'Speaker is not available for the selected schedule';
    }
}