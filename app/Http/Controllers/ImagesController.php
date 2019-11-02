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
        $user_avatar_path = asset('storage/users_' . $user->id . '/avatars/' . $user->avatar);

        $img = Image::make($user_avatar_path)
            ->fit($size)
            ->response('jpg', 100);

        return $img;
    }
}
