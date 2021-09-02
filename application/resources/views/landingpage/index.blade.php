@extends('templatefrontend.master')
@section('title', 'landingpage')
    
@section('content')

<body>
 
    <!-- Banner -->
    <section id="banner">
        <div class="container">
            <div class="bg-banner">
                <div class="owl-carousel owl-theme banner">
                    @foreach ($product as $item)
                    <div class="row">
                        <div class="col-lg-7">
                            <h2 class="text">Get the best product <br> at your home</h2>
                            <a href="{{url('/list/'. $item->id)}}" target="_blank"><button class="button1"> <span class="fas fa-arrow-right float-right"></span> Lihat Barang </button> 
                            </a>
                        </div>
                        <div class="col-lg-5">
                            <img class="img" src="{{asset('assets/skate-removebg-preview.png')}}" alt="skate person">
                        </div>
                    </div>
                     @endforeach
                    {{-- <div class="row">
                        <div class="col-lg-7">
                            <h2 class="text">Get the best product <br> at your home</h2>
                            <button type="button" class="button1">Lihat Barang <i
                                    class="fas fa-arrow-right float-right"></i>
                            </button>
                        </div>
                        <div class="col-lg-5">
                            <img class="img" src="{{asset('assets/skate-removebg-preview.png')}}" alt="skate person">
                        </div>
                    </div> --}}
                    {{-- <div class="row">
                        <div class="col-lg-7">
                            <h2 class="text">Get the best product <br> at your home</h2>
                            <button type="button" class="button1">Lihat Barang <i
                                    class="fas fa-arrow-right float-right"></i>
                            </button>
                        </div>
                        <div class="col-lg-5">
                            <img class="img" src="{{asset('assets/skate-removebg-preview.png')}}" alt="skate person">
                        </div>
                    </div> --}}
                   
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Banner1 -->
 
    <!-- Kategori -->
    <section id="kategori">
        <div class="container">
            <div class="row mt-3">
                <div class="col">
                    <h2 class="text2">Kategori <strong>Pilihan</strong></h2>
                </div>
            </div>
            <div class="bg-kategori mt-2">
                <div class="row row1">
                    @foreach ($category as $item)
                    <div class="col-lg-2">
                        <div class="row justify-content-center">
                            <button class="btn bg-warning"> <img src="{{asset('dist/img/'.$item->icon)}}" alt="" width="100px" height="auto"></button>
                        </div>
                        <div class="row justify-content-center">
                            <p>{{$item->nama}}</p>
                        </div>
                    </div>
                    @endforeach

                    {{-- <div class="col-lg-2">
                        <div class="row justify-content-center">
                            <button class="btn bg-success"> <i class="fas fa-shoe-prints"></i></button>
                        </div>
                        <div class="row justify-content-center">
                            <p>Sepatu</p>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="row justify-content-center">
                            <button class="btn bg-primary"> <i class="fas fa-glasses"></i></button>
                        </div>
                        <div class="row justify-content-center">
                            <p>Kacamata</p>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="row justify-content-center">
                            <button class="btn bg-info"> <i class="fas fa-desktop"></i></button>
                        </div>
                        <div class="row justify-content-center">
                            <p>Elektronik</p>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="row justify-content-center">
                            <button class="btn bg-danger"> <i class="fas fa-tshirt"></i></button>
                        </div>
                        <div class="row justify-content-center">
                            <p>Baju</p>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="row justify-content-center">
                            <button class="btn bg-dark"> <i class="fas fa-plane-departure"></i></button>
                        </div>
                        <div class="row justify-content-center">
                            <p>Tiket</p>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Ketegori -->

    <!-- Barang terlaris -->
    <section id="barang-terlaris">
        <div class="container">
            <div class="row row4 mt-3">
                <div class="col-lg-4">
                    <h2 class="text3">Premium Product for <strong>Every Need</strong></h2>
                </div>
                <div class="col">
                    <p class="text4 text-right pt-4">Barang <strong>Terlaris</strong><i
                            class="fas fa-arrow-right text-right"></i>
                    </p>
                </div> 
            </div>

            <div class="row row5 text-center mt`">
                <div class="owl-carousel owl-theme laris">
                    @foreach ($product as $item)
                    <div class="col">
                        <div class="card" style="width: 100%;">

                            @if ($item->photo == null)
                            <img src="{{asset('dist/img/product.png')}}" class="card-img-top" alt="kamera"
                                width="100%" height="auto" style="object-fit:cover;">
                            @else
                            <img src="{{asset('dist/img/' . $item->photo->nama_photo)}}" class="card-img-top" alt="kamera"
                                width="100%" height="auto" style="object-fit:cover;">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{$item->nama_barang}}</h5>
                                <p class="card-text">IDR. {{number_format($item->harga_barang,2,',','.')}}</p>
                                <a href="{{url('/detail/'. $item->id)}}" class="btn btn-primary form-control" target="_blank">Lihat Barang</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Barang Terlaris -->

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
                    @foreach ($rekomendasi as $item)
                    <div class="col animate__animated animate__fadeInUp animate__delay-1s">
                    <div class="col">
                        <div class="card" style="width: 100%;">
                            <img src="{{asset('dist/img/' . $item->photo->nama_photo)}}" class="card-img-top" alt="kamera"
                                width="100%" height="auto" style="object-fit:cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{$item->nama_barang}}</h5>
                                <p class="card-text">IDR. {{number_format($item->harga_barang,2,',','.')}}</p>
                                <a href="{{url('/detail/'. $item->id)}}" class="btn btn-primary form-control">Lihat Barang</a>
                            </div>
                        </div>
                    </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir rekomendasi -->

    <!-- Barang promo -->
    <section id="promo">
        <div class="container">
            <div class="row row8 pt-3">
                <div class="col-lg-4">
                    <h2 class="text3">Premium Product for <strong>Every Need</strong></h2>
                </div>
                <div class="col">
                    <p class="text-right pt-4">Promo <strong>Hari ini</strong><i
                            class="fas fa-arrow-right text-right"></i>
                    </p>
                </div>
            </div>

            <div class="row row9 text-center">
                <div class="owl-carousel owl-theme promo">
                    @foreach ($promo as $item)
                    <div class="col">
                        <div class="card" style="width: 100%;">
                            <img src="{{asset('dist/img/' . $item->photo->nama_photo)}}" class="card-img-top" alt="kamera"
                                width="100%" height="auto" style="object-fit:cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{$item->nama_barang}}</h5>
                                <p class="card-text">IDR. {{number_format($item->harga_barang,2,',','.')}}</p>
                                <a href="{{url('/detail/'. $item->id)}}" class="btn btn-primary form-control">Lihat Barang</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Barang Promo -->
</body>

@endsection