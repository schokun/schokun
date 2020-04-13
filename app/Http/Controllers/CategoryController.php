<?php

namespace App\Http\Controllers;
use App\Models\Post;

class CategoryController extends Controller
{
    public function __invoke($category)
    {
        $category =  \DB::table('categories')->where('name' , $category)->get()->first();
        $posts = Post::where('category_id' , $category->id)->paginate(2);

        return view('home.category' , compact('posts'));
    }
}
