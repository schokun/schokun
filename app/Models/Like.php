<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Like extends Model
{

    static function add($post_id)
    {
        if (auth()->check()) {
            $user_id = auth()->user()->id;
            $is_like = Self::query()
                ->where('post_id' , $post_id)
                ->where('user_id' , $user_id)
                ->count();

            if($is_like == 1) return null;

            $like = new Self();
            $like->post_id = $post_id;
            $like->user_id = $user_id;
            $like->save();
            $count = Self::query()->where('post_id', $post_id)->count();

            return response()->json($count);
        }

         return response()->json('someErr');
    }

    /**
     * deleteLike.
     * @param Builder $query ,
     * @param $post_id
     *
     * @return integer
     */
    public function scopeDel($query, $post_id)
    {
        $user_id = auth()->user()->id;
        $query->where('user_id', $user_id)->where('post_id' , $post_id)->delete();
        $count = Self::query()->where('post_id', $post_id)->count();

        return response()->json($count);
    }
}
