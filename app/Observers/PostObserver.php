<?php

namespace App\Observers;
use Session;
use App\Models\Post;
use App\Models\Image;

class PostObserver
{
    /**
     * Handle the post "created" event.
     *
     * @param \App\Models\Post $post
     * @return void
     */
    public function created(Post $post)
    {
        Session::flash('flash message', 'Пост был успешно создан!');
    }

    /**
     * Listen to the User created event.
     *
     * @param Post $post
     * @return void
     */
    public function updating(Post $post)
    {
        if (request()->has('image')) {
            $post->setAttribute('image_id', Image::add(request()->image, 'post', $post->image_id));
        }
        Session::flash('flash message', 'Ваш пост был успешно обнавлен!');
    }

    /**
     * Handle the post "updated" event.
     *
     * @param \App\Models\Post $post
     * @return void
     */
    public function updated(Post $post)
    {
        //
    }

    /**
     * Handle the post "deleted" event.
     *
     * @param \App\Models\Post $post
     * @return void
     */
    public function deleted(Post $post)
    {
        //
    }

    /**
     * Handle the post "restored" event.
     *
     * @param \App\Models\Post $post
     * @return void
     */
    public function restored(Post $post)
    {
        //
    }

    /**
     * Handle the post "force deleted" event.
     *
     * @param \App\Models\Post $post
     * @return void
     */
    public function forceDeleted(Post $post)
    {
        //
    }
}
