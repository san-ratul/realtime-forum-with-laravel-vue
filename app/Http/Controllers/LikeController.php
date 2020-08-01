<?php

namespace App\Http\Controllers;

use App\Like;
use App\Reply;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LikeController extends Controller
{
    public function likeit(Reply $reply)
    {
    
       $reply->likes()->create([
        //'user_id' => auth()->id,
        'user_id' => 1,
       ]);

       return response('liked', Response::HTTP_ACCEPTED);
    }

    public function unlikeit(Reply $reply)
    {
        $reply->likes()->where('user_id',1)->first()->delete();
        // $reply->likes()->where('user_id',auth()->id)->first()->delete();
        return response('unliked', Response::HTTP_ACCEPTED);
    }
}

