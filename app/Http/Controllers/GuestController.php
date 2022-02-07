<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use Illuminate\Support\Facades\Auth;


class GuestController extends Controller
{
    public function home(){
        return view('pages.homepage');
    }

    public function posts(){
        $posts = Post::all();
        return view('pages.posts', compact('posts'));
    }

    public function create() {
        return view('pages.create');
    }

    public function store(Request $request) {
        $datas = $request -> validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            /* 'author' => 'required|string|max:255', */
            'date' => 'required|date',
            'description' => 'required|'
        ]);

        $datas['author'] = Auth::user() -> name;

        $post = Post::create($datas);

        return redirect() -> route('posts');
    }
}
