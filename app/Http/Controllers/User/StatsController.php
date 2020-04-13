<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class StatsController extends IndexController
{
    public function __invoke()
    {
        $user_id = Auth::user()->id;

        //$user = Post::where('user_id' , $user_id)->with('image')->get();
        $user = User::with('image')->find($user_id);


        return view('user.stats.index' , compact('user'));
    }
}
