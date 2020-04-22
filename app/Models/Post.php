<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;


class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'title', 'text', 'image_id', 'moderate'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }


    /**
     * Посчитать кол-во комментариев
     * @return integer
     */
    public function comments_count()
    {
        return $this->comments()->count();
    }

    /**
     *
     * @param string $value
     * @return string
     */
    public function getShortTitleAttribute($value)
    {
        $value = $this->title;
        return trim(mb_substr($value, 0, 20) . '...');
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

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug(mb_substr($value, 0, 40)) . bin2hex(openssl_random_pseudo_bytes(4));
    }

    /**
     * @param Request $request
     *
     * @return void
     * */
    static function add($request)
    {
        $user_id = auth()->user()->id;
        $post = new Self;
        $post->user_id = $user_id;
        $post->title = $request['title'];
        $post->text = $request['text'];
        if (request()->hasFile('image')) {
            $post->image_id = Image::add($request['image'], 'post');
        }
        $post->category_id = $request['category_id'];
        $post->save();
    }

    /**
     * Проверить является ли пользователь автором поста
     *
     * @param $post_id
     * @return boolean
     */
    public function is_post_author($post_id): bool
    {
        if (!Auth::check()) return false;

        $post = self::find($post_id);

        if ($post->user_id == Auth::user()->id) {
            return true;
        }

        return false;
    }

    /**
     * Проверить является ли пользователь автором комментария
     *
     * @param $comment_id
     * @return boolean
     */
    public function is_comment_author($comment_id): bool
    {
        if (!Auth::check()) return false;

        $comment = $this->comments()->find($comment_id);

        if ($comment->user_id == Auth::user()->id) {
            return true;
        }

        return false;
    }




    /**
     * like or dislike
     *
     * @param $post_id
     *
     * @return string
     */
    public function isLike($post_id)
    {
        if (auth()->check()) {
            $user_id = auth()->user()->id;
            $count = Like::query()
                ->where('post_id', $post_id)
                ->where('user_id', $user_id)
                ->count();
            if ($count == 1) {
                return 'dislike';
            }
        }

        return 'like';
    }


    /**
     * @param Builder $query ,
     * @param $slug
     *
     * @return Builder $query
     */
    public function scopeGetWithRelations($query , $slug)
    {
        $query->increment('total_views');
        $query->with('image', 'comments.children', 'likes')
            ->where('slug', $slug)
            ->get()
            ->first();

        return $query->get()->first();
    }

}
