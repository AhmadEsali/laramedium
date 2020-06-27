@extends('layouts.dashboard')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/plugins/summernote/summernote-bs4.css">

    @section('content')
    <div class="content-wrapper">


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">edit post {{$post->title}}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="{{ route('post.update',$post->slug) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="author_id" value={{$post->author->id}}>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" id="title" class="form-control"
                                            id="exampleInputEmail1" placeholder="Enter Title"  value="{{ $post->title}}">
                                        @if($errors->has('title'))
                                            <span
                                                class="text-danger">{{ $errors->first('title') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="body">Content</label>
                                        <textarea id="body" name="body" class="textarea"
                                            placeholder="Place some text here"
                                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                            {{$post->body}}
                                        </textarea>
                                        @if($errors->has('body'))
                                            <span
                                                class="text-danger">{{ $errors->first('body') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Select Tags</label>
                                        <select name="tags[]" value={{$post->tags}} multiple="" class="custom-select">
                                            @foreach($tags as $tag)
                                                @foreach ($post->tags as $postTag)
                                                    
                                                <option value="{{ $tag->id }}"{{$tag->id == $postTag->id ? "selected" :""}} >{{ $tag->name }}</option>
                                                @endforeach
                                            @endforeach
                                        </select>
                                        @if($errors->has('tags'))
                                            <span
                                                class="text-danger">{{ $errors->first('tags') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="images">Upload photos</label>
                                        <div class="custom-file">
                                            <input type="file" accept="image/*" multiple class="custom-file-input"
                                                name="images[]" id="images" value={{$post->post_images}}>
                                            <label class="custom-file-label" for="images">Choose file</label>
                                        </div>
                                        @if($errors->has('images'))
                                            <span
                                            
                                                class="text-danger">{{ $errors->first('images') }}
                                            </span>
                                        @endif
                                        <div id="output">
                                            @foreach ($post->post_images as $image)
                                                <img src={{asset('uploads/'.$image->name)}} width="200"/>
                                                
                                            @endforeach

                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>


                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->

    </div>

    @endsection


    @push('scripts')
        <script src="{{ asset("assets/admin") }}/plugins/summernote/summernote-bs4.min.js"></script>
        <script>
            $(function () {
                // Summernote
                $('.textarea').summernote()
            })

        </script>

        <script>
            const images = document.getElementById('images');
            const output = document.getElementById('output');

            
            images.addEventListener('change', (e) => {
                if(output.hasChildNodes()){
                    output.innerHTML=""
                }
                Object.values(e.target.files).forEach(file => {
                    console.log(file)
                    let image = document.createElement('img')
                    image.src = URL.createObjectURL(file)
                    image.style.width = "200px"
                    output.appendChild(image)
                })

            })

        </script>
    @endpush
