<?php

namespace App\BusinessRules;

class MemberIsAvailable
{
    public function __construct($event, $user)
    {
        $this->event = $event;
        $this->user = $user;
    }

    public function passes()
    {
        return $this->user->verifyAvailableUserToEvent($this->event);
    }

    public function message()
    {
        return 'Member is not available for the selected schedule';
    }
}