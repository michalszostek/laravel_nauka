<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ($id != Auth::id()) {
            abort(403, 'Forbidden');
        }
        $user = Auth::user();
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($id != Auth::id()) {
            abort(403, 'Forbidden');
        }

        $this->validate($request, [
            'name' => 'required|max:255|min:3',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore(Auth::id()),
            ],
            'password' => 'min:6|confirmed',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->sex = $request->sex;

        if (!empty($request->password) && $request->password === $request->password_confirmation) {
            $user->password = Hash::make($request->password);
        }

        if (!empty($request->avatar)) {
            $upload_path = 'public/users_' . Auth::id() . '/avatars';
            $path = $request->file('avatar')->store($upload_path);
            $fileName = str_replace($upload_path . '/', '', $path);
            $user->avatar = $fileName;
        }
        $user->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
