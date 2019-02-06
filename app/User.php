<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name','birthdate', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    static function getName($id)
    {
        $x = User::where('id',$id)->get();
        return $x[0]['first_name']." ".$x[0]['last_name'];
    }

    static function getPhoto($id)
    {
        $w  = User::where('id',$id)->get();
        if($w[0]['photo']!="")
        {
            return asset($w[0]['photo']);
        }
        else
        {
            return "http://bootdey.com/img/Content/avatar/avatar7.png";
        }
    }
}
