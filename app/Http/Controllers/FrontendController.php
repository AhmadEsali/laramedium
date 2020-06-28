<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $randomPosts = Post::with(['post_images' => function ($query) {
            $query->latest()->get();
        }])->inRandomOrder()->limit(3)->get();

        $recentPosts = Post::with(['post_images' => function ($query) {
            $query->latest()->get();
        }])->orderByDesc('created_at')->limit(3)->get();

        $mostReadPosts = Post::with(['post_images' => function ($query) {
            $query->latest()->get();
        }])->orderByDesc('created_at')->paginate(3);


        $tags = Tag::all();


        return view('frontend.index', compact('randomPosts', 'recentPosts', 'mostReadPosts', 'tags'));
    }

    public function showPost(Post $post)
    {
        return view('frontend.post', compact('post'));
    }
    public function showTag(Tag $tag)
    {
        return view('frontend.tag', compact('tag'));
    }
}
