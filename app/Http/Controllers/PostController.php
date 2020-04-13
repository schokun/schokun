<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $posts = Post::filter($request)->orderByDesc('id')->with('likes' , 'image' , 'user')->paginate(3);

        return view('home.index', compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  $slug
     * @return Request
     */
    public function show($slug)
    {
        $post = Post::with('image', 'comments.children' , 'likes')
            ->where('slug', $slug)
            ->get()
            ->first();
        $post->increment('total_views');


        return view('post.index', compact('post'));
    }
}

