<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UpdateUserRequest;
use App\User;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{

    public function __construct()
    {
        return $this->middleware('verifyUser')->only('index');
    }

    public function index()
    {
        return view('users.index')->with('users', User::all());
    }

    public function makeAdmin(User $user)
    {
        if ($user->isAdmin()) {
            $user->role = 'writer';
            $user->save();
            session()->flash('info', 'Permissions Removed');

        } else {

            $user->role = 'admin';

            $user->save();

            session()->flash('success', 'User is now admin');

        }

        return redirect()->back();
    }

    public function edit(User $user)
    {
        if (auth()->user()->id === $user->id) {

            return view('users.edit')->with('user', $user);
        } else {

            session()->flash('error', 'You are not authorize');

            return redirect()->back();
        }
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->only(['youtube', 'facebook']);

        if (request()->hasFile('avatar')) {

            $image = $request->avatar->store('profile');

            $data['avatar'] = $image;

            if ($user->profile->avatar != 'profile/default.jpg') {

                Storage::delete($user->profile->avatar);
            }

        }

        $user->update([

            'email' => $request->email,

            'about' => $request->about,
        ]);

        $user->profile()->update($data);

        session()->flash('success', 'Profile Has Been Updated');

        return redirect()->back();
    }

    public function destory(User $user)
    {

        $user->delete();

        $user->profile()->delete();

        $user->posts()->forceDelete();

        session()->flash('success', 'User Deleted Successfully');

        return redirect()->back();
    }
}
