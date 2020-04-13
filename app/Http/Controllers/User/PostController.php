<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\Post\StoreRequest;
use App\Models\Category;
use App\Models\Post;
use Exception;
use Illuminate\Http\Response;

class PostController extends IndexController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user = $this->userInfo;
        $user_id = $user->id;
        $posts =  Post::where('user_id' , $user_id)->get();

        return view('user.post.index' , compact('posts' , 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::all();
        $user = $this->userInfo;

        return view('user.post.create', compact('categories', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return void
     */
    public function store(StoreRequest $request)
    {
        Post::add($request->all());

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $user = $this->userInfo;

        return view('user.post.edit', compact('post' , 'user' , 'categories'));
    }


    public function update(StoreRequest $request, Post $post)
    {
        $data = $request->all();
        $post->update($data);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     *
     * @return void
     * @throws Exception
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->back();
    }
}
