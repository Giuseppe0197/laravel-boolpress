<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;
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
        $categories = Category::all();
        $tags = Tag::all();
        return view('pages.create', compact('categories', 'tags'));
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

        $category = Category::findOrFail($request -> get('category_id'));
        
        $post = Post::make($datas);

        $post -> category() -> associate($category);
        
        $post -> save();
        $tags = Tag::findOrFail($request -> get('tags'));
        $post -> tags() -> attach($tags);

        $post -> save();

        return redirect() -> route('posts');
    }

    public function edit($id) {
        $categories = Category::all();
        $tags = Tag::all();

        $post = Post::findOrFail($id);

        return view('pages.edit', compact('categories', 'tags', 'post'));
    }

    public function update(Request $request, $id) {

        $datas = $request -> validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'required|'
        ]);

        $datas['author'] = Auth::user() -> name;

        $post = Post::findOrFail($id);
        $post -> update($datas);

        $category = Category::findOrFail($request -> get('category_id'));
        $post -> category() -> associate($category);
        $post -> save();

        $tags = Tag::findOrFail($request -> get('tags'));
        $post -> tags() -> sync($tags);
        $post -> save();

        return redirect() -> route('posts');
    }

    public function delete($id) {
        $post = Post::findOrFail($id);
        $post -> tags() -> sync([]);
        $post -> save();

        $post -> delete();
        return redirect() -> route('posts');
    }
}
