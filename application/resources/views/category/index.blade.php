@extends('template.master')
@section('title', 'Category')
    
@section('content')
    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List Category</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <div class="col md-auto">
            <a href="{{url('/category/create')}}" class="btn btn-info btn-sm" role="button">Add Category</a>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col">
            @if(session('status'))
            <div class="alert alert-primary">
              {{session('status')}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List Category</h3>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap" style="text-align:center;">
                  <thead>
                    <tr>
                      <th style="background-color: #04AA6D";>No</th>
                      <th style="background-color: #04AA6D";>Icon</th>
                      <th style="background-color: #04AA6D";>Nama</th>
                      <th style="background-color: #04AA6D";>Edit</th>
                      <th style="background-color: #04AA6D";>Hapus</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($kategori as $item)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td><img src="{{asset('dist/img/' . $item->icon)}}" width="40" height="auto" alt=""></td>
                      <td>{{ $item->nama }}</td>
                      <td>
                        <a href="{{url('/category/'. $item->id.'/edit')}}"><i class="fas fa-pencil-alt" style="color: #04AA6D"></i></a>
                        {{-- <form action="{{url('/category/'.$item->id)}}" method="POST">
                          @csrf
                        </form> --}}
                      </td>
                      <td>
                        <form action="{{url('/category/'.$item->id)}}" method="POST">
                          <button type="submit" style="border:none; background:none; ">
                          <i class="fas fa-trash-alt"></i>
                          @csrf
                          @method('delete')
                          </button>
                        </form>
                      </td>

                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection