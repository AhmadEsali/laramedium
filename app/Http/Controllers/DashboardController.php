<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $posts = Post::where('author_id', auth()->user()->id)->count();

        return view('dashboard.index', compact('posts'));
    }
}
