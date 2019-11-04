<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagesController extends Controller
{
    public function user_avatar($id, $size)
    {
        $user = User::findOrFail($id);
        if ($user->avatar === null) {
            if ($user->sex === 'f') {
                $avatar = asset('storage/default_avatars/f.png');
            } else {
                $avatar = asset('storage/default_avatars/m.png');
            }
            $img = Image::make($avatar)->fit($size)->response('png');
        } else {
            $avatar_path = asset('storage/users_' . $id . '/avatars/' . $user->avatar);
            $img = Image::make($avatar_path)->fit($size)->response('jpg');
        }
        return $img;
    }
}
