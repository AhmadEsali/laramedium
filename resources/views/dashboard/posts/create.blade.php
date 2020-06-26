@extends('layouts.dashboard')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/admin')}}/plugins/summernote/summernote-bs4.css">

@section('content')
<div class="content-wrapper">
  

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Create new post</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" name="title" id="title" class="form-control" id="exampleInputEmail1" placeholder="Enter Title">
                    </div>
                  
                    <div class="form-group">
                      <label for="body">Content</label>
                      <textarea id="body" name="body" class="textarea" placeholder="Place some text here"
                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>                  
                      </div>

                    <div class="form-group">
                      <label>Select Tags</label>
                      <select name="tags[]" multiple="" class="custom-select">
                        @foreach ($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="images">Upload photos</label>
                        <div class="custom-file"> 
                            <input type="file"  accept="image/*" multiple class="custom-file-input" name="images[]" id="images">
                            <label class="custom-file-label" for="images">Choose file</label>
                        </div>
                        <div id="output"></div>
                    </div>
                    
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
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
<script src="{{asset("assets/admin")}}/plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>

<script>
   const images = document.getElementById('images');
   const  output = document.getElementById('output');
   images.addEventListener('change',(e)=>{
       Object.values(e.target.files).forEach(file =>{
           let image = document.createElement('img')
           image.src = URL.createObjectURL(file)
           image.style.width ="200px"
           output.appendChild(image)
       })

   })

</script>
@endpush