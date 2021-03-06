<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\AuthenticationException;

class User extends Authenticatable
{
    public $isAdmin = false;

    use Notifiable;

    /** 
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function generateToken()
    {
        $this->api_token = str_random(60);
        $this->save();

        return $this->api_token;
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }

    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
            if (!$this->hasAnyRole($roles) )
                throw new AuthenticationException;
        }
        else {
            if (!$this->hasRole($roles))
                throw new AuthenticationException;  
        }
        return true;
    }

    /**
     * Check if exist any role passed by parameter
     * 
     * @param array $roles
     * @return bool
     */
    public function hasAnyRole($roles) 
    {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    /**
     * Check if exist the role specified in this user
     * 
     * @param Role $role
     * @return bool
     */
    public function hasRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }

    public function verifyAvailableUserToEvent($event)
    {
        return $this->events()->where([
            ['date_event', $event->date_event],
            ['start_hour', '<=', $event->finish_hour],
            ['finish_hour', '>=', $event->start_hour]
        ])
        ->doesntExist();
    }

    public function maximunCapacityExceed()
    {
        $eventsCount = $this->events()->count();

        return $this->maximun_capacity == null 
                    ? false 
                    : ($eventsCount > $this->maximun_capacity ? true : false);
    }
}
