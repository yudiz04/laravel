

@extends('template.master')
@section('title', 'Edit product')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Product</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Edit Product</li>
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
            <h3 class="card-title">Edit Product</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{url('/product/'.$product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="card-body">
                <div class="form-group">
                    <label for="photo">Foto Product</label>
                    <input type="file" class="form-control-file" name="photo" id="photo">
                    <img src="{{asset('dist/img/' . $product->photo->nama_photo)}}" width="150" height="150" alt="">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="status">
                    <label class="form-check-label" for="status">status</label>
                  </div>
              <div class="form-group">
                <label for="category">Category Product</label>
                <select name="category" class="form-control @error('category') is-invalid @enderror" id="category">
                  @foreach ($category as $item)
                    @if ($item->id==$product->category_id)
                      <option value="{{$item->id}}"selected>{{$item->nama}}</option>  
                        
                    @else
                        
                      <option value="{{$item->id}}">{{$item->nama}}</option>  
                    @endif
                  @endforeach
                </select>
                @error('category') 
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name" value="{{$product->nama_barang}}">
                @error('name') 
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="price">Product Price</label>
                <input type="number" min="0" max="9999999999" name="price" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Price" value="{{$product->harga_barang}}">
                @error('price') 
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="stock">Product Stock</label>
                <input type="number" min="0" max="9999999999" name="stock" class="form-control @error('stock') is-invalid @enderror" id="stock" placeholder="Stock" value="{{$product->stock_barang}}">
                @error('price') 
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="description">Product Description</label>
                <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Description" value="">{{$product->deskripsi_barang}}</textarea>
                @error('description') 
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