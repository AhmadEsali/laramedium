@extends('layouts.dashboard')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/admin')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('assets/admin')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endpush
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Posts</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Posts</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">            
                  <a href="{{route('posts.create')}}" class="btn btn-info btn-lg">
                    <span class="fa fa-plus"></span> 
                  </a>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>title</th>
                    <th>Created At</th>
                    <th>actions</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{$post->title}}</td>
                        <td>{{$post->created_at->diffForHumans()}}</td>
                        <td>
                            <ul class="list-inline m-0">
                               
                                <li class="list-inline-item">
                                    <button class="btn btn-success btn-sm rounded-0" type="submit"  title="Edit"><i class="fa fa-edit"></i></button>
                                </li>
                                <li class="list-inline-item">

                                <form action={{route('posts.destroy',$post->slug)}} method="post">
                                  @csrf
                                  @method('DELETE')
                                        <button class="btn btn-danger btn-sm rounded-0" type="submit"  title="Delete"><i class="fa fa-trash"></i></button>
                                </form>
                                </li>
                            </ul>

                        </td>
                      
                      </tr>
                   
                    @endforeach
                
                    @if(session()->has('message'))
                    <div class="alert {{session('alert') ?? 'alert-info'}}">
                        {{ session('message') }}
                    </div>
                    @endif
          
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

         
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>    <!-- Content Header (Page header) -->
   
    <!-- /.content-header -->

    
  </div>


@endsection
@push('scripts')
<script src="{{asset('assets/admin')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('assets/admin')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('assets/admin')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('assets/admin')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endpush