@extends('template.master')
@section('title', 'Add city')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">city</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('/city')}}">city</a></li>
                <li class="breadcrumb-item active">Add city</li>
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
            <h3 class="card-title">Add <small>city</small></h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{url('/city')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
            <div class="form-group">
              <label for="state">State</label>
              <select name="state" class="form-control @error('state') is-invalid @enderror" id="state">
                @foreach ($state as $item)
                <option value="{{$item->id}}">{{$item->provinsi}}</option>  
                @endforeach
              </select> 
              @error('state') 
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror 
            </div>
              <div class="form-group">
                <label for="city">New city</label>
                <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" id="city" placeholder="New city" value="{{old('city')}}">
                @error('city') 
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