<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikeComment extends Model
{
    protected $guarded = [];

    static function getCount($commentId)
    {
        return LikeComment::where('commentId',$commentId)->count();
    }
}
