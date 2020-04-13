<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(5);

        return response()->json($users);
    }


    public function destroy($id)
    {
        User::find($id)->delete();
        $users = User::paginate(5);

        return response()->json($users);
    }

    public function show($id)
    {
        $user = User::find($id);

        return response()->json($user);
    }

    public function store()
    {
        $user = new User;
        $validator = Validator::make(request()->body, [
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => 'required', 'string'
        ]);

        if ($validator->passes()) {
            $user->password = bcrypt(request()->body['password']);
            $user->name = request()->body['name'];
            $user->email = request()->body['email'];
            $user->save();

            return 'success';
        }

        return response()->json(['error' => $validator->errors()->all()]);
    }

    public function update($id)
    {
        $user = User::find($id);
        $validator = Validator::make(request()->body, [
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
        ]);

        if ($validator->passes()) {
            if (isset(request()->body['password'])) {
                $user->password = request()->body['password'];
            }

            $user->name = request()->body['name'];
            $user->email = request()->body['email'];
            $user->save();
            $users = User::paginate(5);

            return response()->json($users);
        }

        return response()->json(['error' => $validator->errors()->all()]);
    }

    public function getUsersForCreate()
    {
        return response()->json(User::all());
    }
}
