<?php

namespace App\Http\Controllers;

use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedBacks = Feedback::orderByDesc('id')->paginate(10);
        \DB::table('Feedback')->update(['new' => 0]);

        return response()->json($feedBacks);
    }

    public function store()
    {
        request()->validate([
            'g-recaptcha-response' => 'required|captcha'
        ]);
        $feed = new Feedback();
        $feed->email = request()->email;
        $feed->save();


        return back();
    }
}
