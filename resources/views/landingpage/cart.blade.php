@extends('templatefrontend.master')
@section('title', 'cart')
    
@section('content')

<section id="keranjang">
    <div class="container">
        <div class="row">
            <h2><i class="fas fa-home"></i> Landing Page / <strong>Keranjang</strong></h2>
        </div>
        <hr style="margin-top: 0px;">
        <div class="row">
            
            <div class="col-lg-7">
                <div class="bg-keranjang">
                    <div class="row text-center pt-2">
                        <div class="col">
                            <p>Gambar</p>
                        </div>
                        <div class="col">
                            <p>Nama Barang</p>
                        </div> 
                        <div class="col">
                            <p>Kuantitas</p>
                        </div>
                        <div class="col">
                            <p>Action</p>
                        </div>
                    </div>
                    @foreach ($cart as $item)
                    <div class="col-lg-12">
                        <hr style="border: solid 2px gainsboro;">
                    </div>
                    <div class="row text-center">
                        <div class="col">
                            <img src="{{asset('dist/img/' . $item->product->photo->nama_photo)}}" width="75%" height="auto" alt="">
                        </div>
                        <div class="col">
                            <p>{{$item->product->nama_barang}}</p>
                            <p>{{$item->product->harga_barang}}</p>
                        </div>
                        <div class="col">
                            <p>{{$item->kuantitas}}</p>
                        </div>
                        <div class="col">
                            <form action="{{url('/cart/'.$item->id)}}" method="POST"> 
                                @csrf
                                @method('delete')
                               <button type="submit" style="background:none; border:none;"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
            
            <div class="col-lg-5">
                <form action="{{url('/transaction')}}" method="POST">
                    @csrf
                    <input type="hidden" id="subtotal" name="subtotal" value="{{$subtotal}}">
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat"
                            placeholder="Alamat Pengantaran">
                            {{-- @foreach ($alamat as $item)
                            <span value={{"$item->id"}}>{{$item->alamat}}</span>
                            @endforeach --}}
                    </div>
                    <div class="bg-keranjang-detail p-3"> 
                        <h6>Kurir <span><select name="courier" id="courier">
                        @foreach($courier as $item)
                        <option value="{{$item->id}}">{{$item->kurir}}</option>
                        @endforeach
                            </select></span></h6>
                        <hr>
                        <h6>Bank Transfer <span><select name="bank" id="bank">
                        @foreach($bank as $item)
                                <option value="{{$item->id}}">{{$item->bank}}</option>
                        @endforeach
                            </select></span></h6>
                        <hr>
                        <h6>Sub Total <span>{{$subtotal}}</span></h6>
                        <hr>
                    </div>
                    <div>
                        <button class="btn-primary form-control mt-3 text-center" type="submit">Pesan
                            Sekarang</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</section>

<!-- Rekomendasi -->
<section id="rekomendasi">
    <div class="container">
        <div class="row row6 pt-3">
            <div class="col-lg-4">
                <h2 class="text3"><strong>Get</strong> your product at the best price</h2>
            </div>
            <div class="col">
                <a href="listproduct.html" target="_blank" ><p class="text-right pt-4 text-black-50">Rekomendasi <i class="fas fa-arrow-right"></i></p></a>
            </div>
        </div>

        <div class="row row7 text-center">
            <div class="owl-carousel owl-theme rekomen">

                <div class="col animate__animated animate__fadeInUp animate__delay-1s">
                    <div class="card" style="width: 100%;">
                        <img class="img-fluid" src="{{asset('dist/img/app.png')}}" alt="kamera" width="100px"
                            height="auto" style="object-fit:cover;">
                        <div class="card-body">
                            <h5 class="card-title">Mac Book Pro 2021</h5>
                            <p class="card-text">IDR 25.500,000.00</p>
                            <a href="detail.html" target="_blank" class="btn btn-primary">Lihat Barang</a>
                        </div>
                    </div>
                </div>

                <div class="col animate__animated animate__fadeInUp animate__delay-2s">
                    <div class="card" style="width: 100%;">
                        <img class="img-fluid" src="{{asset('dist/img/st.png')}}" alt="kamera" width="100px"
                            height="auto" style="object-fit:cover;">
                        <div class="card-body">
                            <h5 class="card-title">X-box</h5>
                            <p class="card-text">IDR 1,300,000.00</p>
                            <a href="#" class="btn btn-primary">Lihat Barang</a>
                        </div>
                    </div>
                </div>

                <div class="col animate__animated animate__fadeInUp animate__delay-3s">
                    <div class="card" style="width: 100%;">
                        <img class="img-fluid" src="{{asset('dist/img/ps.png')}}" alt="kamera" width="100px"
                            height="auto" style="object-fit:cover;">
                        <div class="card-body">
                            <h5 class="card-title">Playstation 7</h5>
                            <p class="card-text">IDR 7,500,000.00</p>
                            <a href="#" class="btn btn-primary">Lihat Barang</a>
                        </div>
                    </div>
                </div>

                <div class="col animate__animated animate__fadeInUp animate__delay-1s">
                    <div class="card" style="width: 100%;">
                        <img class="img-fluid" src="{{asset('dist/img/app.png')}}" alt="kamera" width="100px"
                            height="auto" style="object-fit:cover;">
                        <div class="card-body">
                            <h5 class="card-title">Mac Book Pro 2021</h5>
                            <p class="card-text">IDR 25.500,000.00</p>
                            <a href="detail.html" target="_blank" class="btn btn-primary">Lihat Barang</a>
                        </div>
                    </div>
                </div>

                <div class="col animate__animated animate__fadeInUp animate__delay-2s">
                    <div class="card" style="width: 100%;">
                        <img class="img-fluid" src="{{asset('dist/img/st.png')}}" alt="kamera" width="100px"
                            height="auto" style="object-fit:cover;">
                        <div class="card-body">
                            <h5 class="card-title">X-box</h5>
                            <p class="card-text">IDR 1,300,000.00</p>
                            <a href="#" class="btn btn-primary">Lihat Barang</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- Akhir rekomendasi -->

@endsection