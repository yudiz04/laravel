

@extends('template.master')
@section('title', 'Edit courier')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">courier</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Edit courier</li>
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
            <h3 class="card-title">Edit <small>courier</small></h3>
          </div> 
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{url('/courier/'.$courier->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="card-body">
              <div class="form-group">
                <label for="courier">courier</label>
                <input type="text" name="courier" class="form-control @error('courier') is-invalid @enderror" id="courier" placeholder="New courier" value="{{$courier->kurir}}" >
                @error('courier')  
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
              </div> 
              <div class="form-group">
                <label for="ongkir">Ongkir</label>
                <input type="text" name="ongkir" class="form-control @error('ongkir') is-invalid @enderror" id="ongkir" placeholder="New ongkir" value="{{$courier->ongkir}}" >
                @error('ongkir')  
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