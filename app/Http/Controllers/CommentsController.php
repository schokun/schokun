<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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
        $res = Comment::add();
        $html = View('post.ajax.comment', ['res' => $res['comment']])->render();

        return Response::json(['html' => $html , 'count' => $res['count']]);
    }


    public function destroy(Comment $comment)
    {
        $comment->delete();
        $count = $comment->countComments();

        return response()->json(compact('count'));
    }
}
