<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Image;

class UserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        //
    }


    /**
     * Listen to the User created event.
     *
     * @param User $user
     * @return void
     */
    public function updating(User $user)
    {
        if(isset( request()->body['password']) || isset( request()->password )) {
            $user->password = bcrypt($user->password);
        } else{
           $user->setAttribute('password' , $user->getOriginal('password'));
        }

//        if(isset($user->password)){
//            $user->password = bcrypt($user->password);
//
//        }else{
//            $user->setAttribute('password' , $user->getOriginal('password'));
//        }

        if (request()->has('image')) {
            $user->setAttribute('image_id', Image::add(request()->image, 'user', $user->image_id));
        }
        session()->flash('flash message', 'Сохранено!');
    }



    /**
     * Handle the user "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {

    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the user "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
