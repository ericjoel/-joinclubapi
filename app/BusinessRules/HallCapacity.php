<?php

namespace App\BusinessRules;

class HallCapacity
{
    public function __construct($event)
    {
        $this->event = $event;
    }

    public function passes()
    {
        return !$this->event->isFull();
    }

    public function message()
    {
        return 'The event is full';
    }
}