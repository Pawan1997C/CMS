<?php

namespace App\Http\Controllers\Blog;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Settings;
use App\Tag;

class PostsController extends Controller
{
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $next = Post::where('id', '>', $post->id)->min('id');
        $prev = Post::where('id', '<', $post->id)->max('id');

        return view('blog.post')
            ->with('title', Post::where('slug', $slug)->get()->first()->title)
            ->with('categories', Category::take(5)->get())
            ->with('next', Post::find($next))
            ->with('prev', Post::find($prev))
            ->with('setting', Settings::first())
            ->with('post', $post);
    }

    public function blog(Category $category)
    {
        return view('blog.category')
            ->with('title', $category->name)
            ->with('category', $category)
            ->with('categories', Category::take(5)->get())
            ->with('setting', Settings::first());
    }

    public function tag(Tag $tag)
    {
        return view('blog.tag')
            ->with('tag', $tag)
            ->with('title', $tag->name)
            ->with('categories', Category::take(5)->get())
            ->with('setting', Settings::first());
    }
}
