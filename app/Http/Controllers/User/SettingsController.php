<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\UpdateRequest;
use App\Models\Image;
use Illuminate\Http\Response;

class SettingsController extends IndexController
{

    /**
     * Display the specified resource.
     *
     * @return void
     */
    public function show()
    {
        $user = $this->userInfo;

        return view('user.settings.index', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @return Response
     */
    public function update(UpdateRequest $request)
    {
        $user = $this->userInfo;
        $data = $request->only(['name', 'password', 'email']);
        $user->update($data);

        return back();
    }
}
