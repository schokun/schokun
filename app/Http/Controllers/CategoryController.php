<?php

namespace App\Http\Controllers;
use App\Models\Post;

class CategoryController extends Controller
{
    public function __invoke($category)
    {
        $categories = \DB::table('categories')->with('posts')->select()->get();

        $category =  \DB::table('categories')->where('name' , $category)->get()->first();
        $posts = Post::where('category_id' , $category->id)
            ->where('moderate' , 1)
            ->paginate(2);

        return view('home.category' , compact('posts' , 'categories'));
    }
}
