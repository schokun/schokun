<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use PhpParser\Builder;
use Illuminate\Support\Str;

class Comment extends Model
{

    /*
     * Добавить коментарий
     * @param  $data
     *
     * */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function countComments(){
        return $this->post->comments_count();
    }


    /**
     *
     * @param string $value
     * @return string
     */
    public function getTimeAttribute($value)
    {
        $value = $this->created_at;
        return Carbon::instance($value)->diffForHumans();
    }


    //Мутатор

    public function setFirstSlugAttribute($value)
    {
        $this->attributes['first_name'] = strtolower($value);
    }

    /**
     * Проверить автор ли комментария или Автор Поста.
     * @param Builder $query ,
     * @param $slug
     *
     * @return Builder $query
     */
    public function scopeAuthor($query, $slug)
    {
        $comment = $query->where('slug', '=', $slug)->get()->first();
        $post = Post::where('id' , $comment->id)->get()->first();

        if ($comment->user_id == Auth::user()->id || $post->user_id == Auth::user()->id ) {
            return $comment->delete();
        }

        return back();
    }



    static function add()
    {

        $user_id = Auth::user()->id;
        $parent_id = request()->parent_id ?? null;
        $name = request()->user_name ?? '';
        $url = explode('/', url()->previous());
        $slug = end($url);
        $post = Post::where('slug', $slug)->get()->first();

        //в бд
        $comment = new self();
        $comment->user_id = $user_id;
        $comment->name = $name;
        $comment->post_id = $post->id;
        $comment->parent_id = $parent_id;
        $comment->text = request()->comment;
        $comment->slug = Str::slug(mb_substr($comment->text, 0, 40)) . bin2hex(openssl_random_pseudo_bytes(4));
        $comment->save();

        $res['count'] =  Post::where('id' , $post->id)->get()->first()->comments_count();
        $res['comment'] = Self::orderByDesc('id')->get()->first();

        return $res;
    }

}
