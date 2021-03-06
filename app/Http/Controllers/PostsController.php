<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{

    public function __construct()
    {

        return $this->middleware('verifyCategoriesCount')->only(['create', 'store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->isAdmin()) {
            return view('posts.index')->with('posts', Post::Paginate(4));
        } else {

            return view('posts.index')->with('posts', auth()->user()->posts()->Paginate(4));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('posts.create')->with('categories', Category::all())->with('tags', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {

        $image = $request->image->store('posts');

        $post = Post::create([

            'title' => $request->title,

            'discruption' => $request->discruption,

            'content' => $request->content,

            'image' => $image,

            'slug' => str_slug($request->title),

            'user_id' => $request->user()->id,

            'published_at' => $request->published_at,

            'category_id' => $request->category_id,

        ]);

        if ($request->tag) {
            $post->tags()->attach($request->tag);
        }

        session()->flash('success', 'Post Created Successfully!!');

        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if (auth()->user()->isAdmin() || auth()->user()->id === $post->user->id) {
            return view('posts.create')->with('post', $post)->with('categories', Category::all())->with('tags', Tag::all());
        } else {

            session()->flash('error', 'Sorry You are not authorized');
            return redirect()->back();

        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {

        $data = $request->only(['title', 'discruption', 'content', 'published_at', 'category_id']);

        if ($request->hasFile('image')) {

            $image = $request->image->store('posts');

            $data['image'] = $image;

            Storage::delete($post->image);
        }

        if ($request->tag) {
            $post->tags()->sync($request->tag);
        }

        $data['slug'] = str_slug($request->title);

        $post->update($data);

        session()->flash('success', 'Post Updated Successfully!!');

        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();

        if ($post->trashed()) {

            $post->forceDelete();

            Storage::delete($post->image);

        } else {

            $post->delete();
        }

        session()->flash('success', 'Post Deleted Successfully!!');

        return redirect()->back();
    }

    public function trashed()
    {
        return view('posts.index')->with('posts', Post::onlyTrashed()->Paginate(4));
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();

        $post->restore();

        session()->flash('success', 'Post Restored Successfully!!');

        return redirect(route('posts.index'));
    }
}
