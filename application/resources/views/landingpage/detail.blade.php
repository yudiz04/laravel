@extends('templatefrontend.master')
@section('title', 'detail')
    
@section('content')

    <!-- detail product -->
    <section id="dtl-product">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="text1"> <i class="fas fa-home"></i> Landing Page / <strong>Detail Product</strong></h2>
                    <hr>
                </div>
            </div>
            
            <div class="row">
                
                <div class="col-lg-6 text-lg-center">
                    
                    <img src="{{asset('dist/img/' . $product->photo->nama_photo)}}" width="75%" height="auto" alt="">
                </div> 
                <div class="col-lg-6 text-center">
                    <div class="row">
                        <h3>{{$product->nama_barang}}</h3>
                    </div>
                    <div class="row">
                        <h5>IDR. {{number_format($product->harga_barang,2,',','.')}}</h5> 
                    </div> 
                    <div class="row">
                        <h5>Stock = {{$product->stock_barang}}</h5>
                    </div>
                    <div class="row">
                        <h5>Terjual = {{$product->terjual}}</h5>
                    </div>
                    <form action="{{url('/cart')}}" method="POST">
                        @csrf
                    <div class="row">
                        <input type="number" class="form-control" id="kuantitas" name="kuantitas">
                    </div>
                    <br>
                    <div class="row row5">
                        <p>{{$product->deskripsi_barang}}</p>
                    </div>
                </div>
            </div>
            <div class="row pt-3">
                <div class="col-lg-6">
                    <div class="owl-carousel owl-theme detail">
                        
                        <div class="col">
                            <img src="{{asset('dist/img/' . $product->photo->nama_photo)}}" alt="" width="100%" height="auto" object-fit="cover">
                        </div>
                        <div class="col">
                            <img src="{{asset('dist/img/' . $product->photo->nama_photo)}}" alt="" width="100%" height="auto" object-fit="cover">
                        </div>
                        <div class="col">
                            <img src="{{asset('dist/img/' . $product->photo->nama_photo)}}" alt="" width="100%" height="auto" object-fit="cover">
                        </div>
                        <div class="col">
                            <img src="{{asset('dist/img/' . $product->photo->nama_photo)}}" alt="" width="100%" height="auto" object-fit="cover">
                        </div>
                    </div>
                </div>
                
                    <div class="col-lg-3 text-center pt-5">
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <button type="submit" class="btn button1"> Tambahkan
                            Keranjang <i class="fas fa-shopping-cart pr-1"></i></button>
                    </div>
                </form>
                    {{-- <div class="col-lg-3 text-center pt-5">
                        <button type="button" class="button2"> Beli Sekarang <i class="fas fa-arrow-right pr-2"></i>
                        </button>
                    </div> --}}
                    
            </div>
            
        </div>
    </section>
    <!-- Akhir detail product -->

    <!-- Ulasan -->
    <section id="ulasan">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="text2 pt-5"><strong>Ulasan</strong></h2>
                </div>
            </div>

            <div class="row pt-3">
                <div class="col-lg-2 text-center">
                    <img class="img2"
                        src="{{asset('assets//positive-bearded-man-hipster-smiles-broadly-has-pleased-expression-laughs-something-funny-closes-eyes.jpg')}}"
                        alt="">
                </div>
                <div class="col-lg-10">
                    <div class="row">
                        <h4>ANONYMOUS</h4>
                    </div>
                    <div class="row">
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>
                    <div class="row">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-2 text-center">
                    <img class="img2"
                        src="{{asset('assets/people-joy-concept-overjoyed-dark-haired-adult-woman-laughs-happily-with-closed-eyes-talks-casually-with-friend-cannot-hold-laughter-wears-casual-turtneck-isolated-brown-wall.jpg')}}"
                        alt="">
                </div>
                <div class=col-lg-10>
                    <div class="row">
                        <h4>UNKNOW</h4>
                    </div>
                    <div class="row">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, voluptates?</p>
                    </div>
                    <div class="row">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir ulasan -->

    <!-- Promo -->
    <section id="promo">
        <div class="container">
            <div class="row row6 pt-3">
                <div class="col-lg-4">
                    <h2 class="text3"><strong>Get</strong> your product at the best price</h2>
                </div>
                <div class="col">
                    <a href="listproduct.html" target="_blank" ><p class="text-right pt-4 text-black-50">Promo Hari Ini <i class="fas fa-arrow-right"></i></p></a>
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
    <!-- Akhir Promo -->

@endsection