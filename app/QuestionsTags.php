<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionsTags extends Model
{
    protected  $guarded = [];

    static function getList($questionId)
    {
        $list = QuestionsTags::where('questionId',$questionId)->get();
        return $list;
    }

    static function getImplode($questionId)
    {
        $returnArray = [];
        $list = QuestionsTags::where('questionId',$questionId)->get();
        foreach ($list as $k => $v)
        {
            $returnArray[] = $v['name'];
        }
        return implode(',',$returnArray);
    }
}
