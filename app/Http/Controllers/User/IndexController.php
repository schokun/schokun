<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;

class IndexController extends Controller
{
    protected $userInfo = '';
    public function __construct(Auth $auth)
    {
        $this->middleware(function ($request, $next) {
             $this->userInfo = User::find(Auth::user()->id);
            return $next($request);
        });
    }
}
