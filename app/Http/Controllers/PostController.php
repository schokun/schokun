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
        $posts = Post::orderByDesc('id')
            ->with('likes' , 'image' , 'user')
            ->where('moderate' , 1)
            ->paginate(3);

        $categories = \DB::table('categories')->select()->get();

        return view('home.index', compact('posts' , 'categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  $slug
     * @return Request
     */
    public function show($slug)
    {
        $post = Post::getWithRelations($slug);

        return view('post.index', compact('post'));
    }
}

