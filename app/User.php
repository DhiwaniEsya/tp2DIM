<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
 
    protected $fillable = [
        'name', 'email', 'password',
    ];
 
    protected $hidden = [
        'password', 'remember_token',
    ];
 
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_users');
    } 

    public function hasRole($role) 
{
  return $this->roles()->where('name', $role)->count() == 1;
}
}
