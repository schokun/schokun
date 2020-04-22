<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Throwable as ThrowableAlias;
use Response;



class CommentsController extends Controller
{
    /**
     *
     * @return JsonResponse
     *
     * @throws ThrowableAlias
     */
    public function store()
    {
        $id = \Auth::user()->id;
        $res = Comment::add();
        $user = User::with('image')->where('id' , $id)->get()->first();

        $html = View('post.ajax.comment', ['res' => $res['comment'] , 'user' => $user ])->render();

        return Response::json(['html' => $html , 'count' => $res['count']]);
    }


    public function destroy(Comment $comment)
    {
        $comment->delete();
        $count = $comment->countComments();

        return response()->json(compact('count'));
    }
}
