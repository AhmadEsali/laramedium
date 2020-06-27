<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\PostImage;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use File;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $posts = Post::where('author_id', auth()->user()->id)
            ->with('post_images')
            ->orderBy('created_at', 'desc')
            ->get();


        return view('dashboard.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();

        return view('dashboard.posts.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {

        $user = Auth::user();


        $post = Post::create([
            'title' => $request->title,
            'body'  => $request->body,
            'author_id' => $user->id
        ]);

        $post->tags()->sync($request->tags);

        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {
                $name = $image->getClientOriginalName();
                $image->move(public_path() . '/uploads/', $name);
                // $imagePath = Storage::disk('uploads')->put($user->email . '\posts\\' . $post->id . '\\', $image);
                PostImage::create([
                    'name' =>   $name,
                    'post_id' => $post->id
                ]);
            }
        }




        return redirect()->route('post.index')->with(['message' => 'add post successfully', 'alert' => 'alert-success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();

        return view('dashboard.posts.edit', compact('post', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {



        $user = Auth::user();
        foreach ($post->post_images as $image) {
            Storage::delete('uploads/' . $image->name);
        }


        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $images = $request->file('images');
            foreach ($images as $image) {
                $name = $image->getClientOriginalName();
                $image->move(public_path() . '/uploads/', $name);
                PostImage::where('post_id', $post->id)->update([
                    'name' =>   $name,
                ]);
            }
        }

        $post->update([
            'title' => $request->title,
            'body'  => $request->body,
        ]);

        $post->tags()->sync($request->tags);

        return redirect()->route('post.index')->with(['message' => 'update post successfully', 'alert' => 'alert-success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        foreach ($post->post_images as $image) {
            Storage::delete('uploads/' . $image->name);
        }

        $post->tags()->detach();
        $post->delete();

        return redirect()->back()->with(['message' => 'deleting success', 'alert' => 'alert-success']);
    }
}
