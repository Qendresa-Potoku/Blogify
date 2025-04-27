<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homepage()
{
    if (auth()->check()) {
        
        $posts = Post::with('user')
            ->where('user_id', '!=', auth()->id())
            ->latest()
            ->paginate(5);
    } else {
        
        $posts = Post::with('user')
            ->latest()
            ->paginate(5);
    }

    return view('home', ['posts' => $posts]);
}


    public function myposts()
    {
        $posts = Post::where('user_id', auth()->id())->latest()->paginate(5);
        return view('myposts', ['posts' => $posts]);
    }
}
