<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $categories = Category::with('posts')->get();

        return response()->json($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $category  = new Category;
        $category->name = $request->body;
        $category->save();

        return response()->json(Category::with());
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     *
     * @return Response
     */
    public function update(Request $request , $id)
    {
        $category  = Category::find($id);
        $category->name = $request->body;
        $category->save();

        return response()->json('success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();

        return response()->json(Category::all());
    }
}
