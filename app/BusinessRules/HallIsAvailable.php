<?php

namespace App\BusinessRules;

use Illuminate\Support\Facades\DB;

class HallIsAvailable
{
    public function __construct($hall_id, $date_event, $start_hour, $finish_hour)
    {
        $this->hall_id = $hall_id;
        $this->date_event = $date_event;
        $this->start_hour = $start_hour;
        $this->finish_hour = $finish_hour;
    }

    public function passes()
    {
        // ( (Y1 <= X1 AND Y2 >= X1) OR (Y2 >= X2 AND Y1 <= X2) )
        return DB::table('events')
            ->where([
                ['date_event', $this->date_event],
                ['hall_id', $this->hall_id]
            ])
            ->where(function ($query) {
                $query->where([
                    ['start_hour', '<=', $this->start_hour],
                    ['finish_hour', '>=', $this->start_hour]
                ])
                ->where([
                    ['finish_hour', '>=', $this->finish_hour],
                    ['start_hour', '<=', $this->finish_hour]
                ]);
            })
            ->exists();
    }

    public function message()
    {
        return 'The hall is already taken for the selected schedule';
    }
}