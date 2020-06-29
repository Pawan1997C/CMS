<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        return view('home')
            ->with('category', \App\Category::all()->count())
            ->with('user', \App\User::all()->count())
            ->with('post', \App\Post::all()->count())
            ->with('tag', \App\Tag::all()->count());
    }
}
