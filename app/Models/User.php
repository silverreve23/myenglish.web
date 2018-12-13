<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable{
    use Notifiable;
    
    protected $fillable = [
        'name', 'email', 'password', 'period',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    protected function checkUser($email, $name, $passwd){
        return $this->firstOrCreate(array(
            'email' => $email
        ), array(
            'name' => $name,
            'password' => bcrypt($passwd)
        ));
    }
    protected function getUser($email){
        return $this->where('email', $email)->first();
    }    
    protected function changePeriod($period, $user){
        return $this->where('id', $user)->update(array(
            'period' => $period
        ));
    }
}
