

@extends('template.master')
@section('title', 'Edit bank')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">bank</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Edit bank</li>
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
            <h3 class="card-title">Edit <small>bank</small></h3>
          </div> 
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{url('/bank/'.$bank->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="card-body">
              <div class="form-group">
                <label for="bank">bank</label>
                <input type="text" name="bank" class="form-control @error('bank') is-invalid @enderror" id="bank" placeholder="New bank" value="{{$bank->bank}}" >
                @error('bank')  
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
              </div> 
              <div class="form-group">
                <label for="no_rek">No Rekening</label>
                <input type="text" name="no_rek" class="form-control @error('no_rek') is-invalid @enderror" id="no_rek" placeholder="New No Rekening" value="{{$bank->no_rekening}}" >
                @error('no_rek')  
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