<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Notifications extends Model
{
    protected  $guarded = [];

    static function getIsReadCount()
    {
        return Notifications::where('receiverUserId',Auth::id())->where('isRead',1)->count();
    }
}
