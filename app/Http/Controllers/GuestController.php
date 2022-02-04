<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class GuestController extends Controller
{
    public function home(){
        $posts = Post::all();
        return view('pages.homepage', compact('posts'));
    }

    public function store(Request $request) {
        $datas = $request -> validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'required|'
        ]);

        $post = Post::create($datas);

        return redirect() -> route('home');
    }
}
