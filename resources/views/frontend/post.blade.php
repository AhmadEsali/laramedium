@extends('layouts.frontend')
@section('page-header')
<div id="post-header" class="page-header">
    <div class="background-img" style="background-image: url('{{asset('uploads/'.$post->post_images[0]->name)}}');"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="post-meta">
                    @foreach($post->tags as $tag)

                    <a class="post-category cat-2"
                        href="{{ route('tag.show',$tag->id) }}">{{ $tag->name }}</a>
                @endforeach
                    <span class="post-date">{{ $post->created_at->toDateString() }}</span>
                </div>
                <h1>{{$post->title}}</h1>
            </div>
        </div>
    </div>
</div>
<!-- /Page Header -->
@endsection

@section('content')

<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- Post content -->
            <div class="col-md-8">
                <div class="section-row sticky-container">
                    <div class="main-post">
                       {{$post->body}}
                    </div>
                  
                </div>

                <div class="section-row text-center">
                    @foreach ($post->post_images as $image)
                        
                    <img class="img-responsive" src="{{asset('uploads/'.$image->name)}}" alt="">
                    @endforeach
                </div>
                
                <!-- author -->
                <div class="section-row">
                    <div class="post-author">
                        <div class="media">
                            <div class="media-left">
                                <img class="media-object" src="./img/author.png" alt="">
                            </div>
                            <div class="media-body">
                                <div class="media-heading">
                                <h3>{{$post->author->name}}</h3>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /author -->

               

           
            </div>
            <!-- /Post content -->

        
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->


@endsection
