<?php

namespace App\Http\Controllers\front\user;

use App\Comments;
use App\Questions;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class indexController extends Controller
{
    public function index($id)
    {
        $c = User::where('id',$id)->count();
        if($c!=0)
        {
            $data = User::where('id',$id)->get();
            $questions = Questions::where('userId',$id)->orderBy('id','desc')->get();
            $comments = Comments::where('userId',$id)->orderBy('id','desc')->get();
            return view('front.user.index',['data'=>$data,'questions'=>$questions,'comments'=>$comments]);
        }
        else
        {
            abort(404);
        }
    }


    public function all()
    {
        $data = User::orderBy('id','desc')->paginate(10);
        return view('front.user.all',['data'=>$data]);
    }
}
