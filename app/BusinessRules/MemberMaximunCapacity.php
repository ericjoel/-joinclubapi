<?php

namespace App\BusinessRules;

class MemberMaximunCapacity
{
    public function __construct($user)
    {
        $this->user = $user;
    }

    public function passes()
    {
        return !$this->user->maximunCapacityExceed();
    }

    public function message()
    {
        return 'Member exceed his maximun capacity to join events, please upgrade to VIP';
    }
}