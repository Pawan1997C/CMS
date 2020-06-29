<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Settings;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome')
            ->with('first_post', Post::orderBy('created_at', 'desc')->first())
            ->with('second', Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first())
            ->with('third', Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first())
            ->with('categories', Category::take(5)->get())
            ->with('cat', Category::first())
            ->with('title', Settings::first()->site_name)
            ->with('setting', Settings::first());
    }

}
