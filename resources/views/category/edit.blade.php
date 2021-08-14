

@extends('template.master')
@section('title', 'Edit category')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Category</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Edit Category</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Edit <small>Category</small></h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{url('/category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="card-body">
              <div class="form-group">
                <label for="icon">Product Photo</label>
                <input type="file" class="form-control-file" name="icon" id="icon">
            </div>
              <div class="form-group">
                <label for="kategori">Category</label>
                <input type="text" name="kategori" class="form-control @error('kategori') is-invalid @enderror" id="kategori" placeholder="New category" value="{{$category->nama}}" >
                @error('kategori') 
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
        </div>
      <!--/.col (left) -->
      <!-- right column -->
      <div class="col-md-6">

      </div>
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>

</div>
<!-- /.content -->
@endsection