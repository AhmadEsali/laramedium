@extends('layouts.frontend')


@section('content')

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            @foreach($randomPosts as $randomPost)
            @if ($loop->last)
            @break
            @endif
                <!-- post -->
                <div class="col-md-6">
                    <div class="post post-thumb">
                        @if($randomPost->post_images->count())
                            <a class="post-img"
                                href="{{ route('post.show',$randomPost->slug) }}">
                                <img src="{{ asset('uploads/'.$randomPost->post_images[0]->name) }}"
                                    alt="">
                               
                                </a>
                        @endif

                        <div class="post-body">
                            <div class="post-meta">
                                @foreach($randomPost->tags as $tag)

                                    <a class="post-category cat-2"
                                        href="{{ route('tag.show',$tag->id) }}">{{ $tag->name }}</a>
                                @endforeach
                                <span class="post-date">{{ $randomPost->created_at->toDateString() }}</span>
                            </div>
                            <h3 class="post-title"><a
                                    href="{{ route('post.show',$randomPost->slug) }}">{{ $randomPost->title }}</a>
                            </h3>
                        </div>
                    </div>
                </div>
                <!-- /post -->
            @endforeach


        </div>
        <!-- /row -->

        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>Recent Posts</h2>
                </div>
            </div>

            @foreach ($recentPosts as $recentPost)
                  <!-- post -->
            <div class="col-md-4">
                <div class="post">
                    @if($recentPost->post_images->count())
                    <a class="post-img"
                        href="{{ route('post.show',$recentPost->slug) }}">
                        <img src="{{ asset('uploads/'.$recentPost->post_images[0]->name) }}"
                            alt="">
                       
                        </a>
                @endif
                    <div class="post-body">
                        <div class="post-meta">
                            @foreach($recentPost->tags as $tag)

                            <a class="post-category cat-2"
                                href="{{ route('tag.show',$tag->id) }}">{{ $tag->name }}</a>
                        @endforeach                            <span class="post-date">{{ $recentPost->created_at->toDateString() }}</span>
                        </div>
                        <h3 class="post-title"><a
                            href="{{ route('post.show',$recentPost->slug) }}">{{ $recentPost->title }}</a>
                    </h3>
                    </div>
                </div>
            </div>
            <!-- /post -->

            @endforeach
          
         
       
        </div>
        <!-- /row -->

     
    </div>
    <!-- /container -->
</div>
<!-- /section -->

<!-- section -->
<div class="section section-grey">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h2>Featured Posts</h2>
                </div>
            </div>

            @foreach ($randomPosts as $randomPost)
           
                  <!-- post -->
            <div class="col-md-4">
                <div class="post">
                    @if($randomPost->post_images->count())
                    <a class="post-img"
                        href="{{ route('post.show',$randomPost->slug) }}">
                        <img src="{{ asset('uploads/'.$randomPost->post_images[0]->name) }}"
                            alt="">
                       
                        </a>
                @endif
                    <div class="post-body">
                        <div class="post-meta">
                            @foreach($randomPost->tags as $tag)

                            <a class="post-category cat-2"
                                href="{{ route('tag.show',$tag->id) }}">{{ $tag->name }}</a>
                        @endforeach                
                                    <span class="post-date">{{ $randomPost->created_at->toDateString() }}</span>
                        </div>
                        <h3 class="post-title"><a
                            href="{{ route('post.show',$randomPost->slug) }}">{{ $randomPost->title }}</a>
                    </h3>
                    </div>
                </div>
            </div>
            <!-- /post -->

            @endforeach

         
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2>Most Read</h2>
                        </div>
                    </div>
                @foreach ($mostReadPosts as $post)
                        <!-- post -->
                        <div class="col-md-12">
                            <div class="post post-row">
                                @if($post->post_images->count())
                        <a class="post-img"
                            href="{{ route('post.show',$post->slug) }}">
                            <img src="{{ asset('uploads/'.$post->post_images[0]->name) }}"
                                alt="">
                           
                            </a>
                    @endif
                                <div class="post-body">
                                    <div class="post-meta">
                                        @foreach($post->tags as $tag)
    
                                        <a class="post-category cat-2"
                                            href="{{ route('tag.show',$tag->id) }}">{{ $tag->name }}</a>
                                    @endforeach       
                                    <span class="post-date">{{ $post->created_at->toDateString() }}</span>
    
                                    </div>
                                    <h3 class="post-title"><a href="{{ route('post.show',$post->slug) }}">{{$post->title}}</a></h3>
                                    <p>{{Str::of($post->body)->words(20, ' ...')}}</p>
                                </div>
                            </div>
                        </div>
                        <!-- /post -->
    
                @endforeach
                
                    <div class="col-md-12">
                        <div class="section-row">
                            {{$mostReadPosts->links()}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
              

              
                <!-- tags -->
                <div class="aside-widget">
                    <div class="section-title">
                        <h2>Tags</h2>
                    </div>
                    <div class="tags-widget">
                        <ul>
                            @foreach ($tags as $tag)
                                
                            <li><a href="{{route('tag.show',$tag->id)}}">{{$tag->name}}</a></li>
                            @endforeach
                            
                        </ul>
                    </div>
                </div>
                <!-- /tags -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->
@endsection
