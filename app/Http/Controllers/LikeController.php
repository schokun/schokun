<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;


class LikeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return string
     */
    public function store(Request $request)
    {
       $post_id = $request->post_id;

       return Like::add($post_id);
    }


    public function destroy(Request $request)
    {
        $post_id = $request->post_id;

        return Like::del($post_id);
    }
}
