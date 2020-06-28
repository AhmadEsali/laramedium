@extends('layouts.frontend')
@section('page-header')
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <ul class="page-header-breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li>{{ $tag->name }}</li>
                </ul>
                <h1>{{ $tag->name }}</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')

<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-8">
                <!-- ad -->
                <div class="col-md-12">
                    <div class="section-row">
                        <a href="#">
                            <img class="img-responsive center-block" src="./img/ad-2.jpg" alt="">
                        </a>
                    </div>
                </div>
                <!-- ad -->

                @foreach($tag->posts as $post)
                    <!-- post -->
                    <div class="col-md-12">
                        <div class="post post-row">
                        <a class="post-img" href="{{ route('post.show',$post->slug) }}"><img src="{{asset('uploads/'.$post->post_images[0]->name)}}" alt=""></a>
                            <div class="post-body">
                                <div class="post-meta">

                                    <a class="post-category cat-2"
                                        href="{{ route('tag.show',$tag->id) }}">{{ $tag->name }}</a>
                                    <span class="post-date">{{ $post->created_at->toDateString() }}</span>
                                </div>
                                <h3 class="post-title"><a href="{{ route('post.show',$post->slug) }}">{{ $post->title }}</a></h3>
                                <p>{{ Str::of($post->body)->words(20, ' ...') }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- /post -->
                @endforeach

            </div>
        </div>
    </div>
</div>


@endsection
