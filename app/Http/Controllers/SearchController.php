<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;

class SearchController extends Controller
{
    public function users()
    {
        $phrase = Input::get('q');
        $results = User::where('name', 'like', "%$phrase%")->paginate(10);

        return view('search.users', compact('results'));
    }
}
