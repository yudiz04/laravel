<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>listproduk</title>

    <!-- my css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/mobile.css')}}">
 
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('owlcarousel/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('owlcarousel/assets/owl.theme.default.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
</head> 

<body>
    <!-- Header -->
    

    <section id="header">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#"><img src="{{asset('assets/Logo-removebg-preview (1).png')}}"
                        width="100%"></img></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="col-lg-6">
                        <input type="text" placeholder="Cari apa">
                    </div>
                    <div class="col">
                        <div class="row justify-content-center">
                        <img class="icon" href="#" src="{{asset('assets/scart.png')}}" width="23px" height="auto"></img>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row justify-content-center">
                        <img class="icon" href="#" src="{{asset('assets/notification.svg')}}" width="23px"></img>
                        </div>
                    </div>

                    @if (Auth::user())
                    <div class="col">
                        <a href="#" role="button" class="btn btn1">{{Auth::user()->name}}</a>
                    </div>
                    <div class="col">
                        <a href="{{url('/logoutCust')}}" role="button" class="btn btn1">Logout</a>
                    </div>
                    @else
                    <div class="col">
                        <button type="button" class="btn btn1" data-toggle="modal"
                        data-target="#modalregis">Register</button>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn2" data-toggle="modal"
                            data-target="#modallogin">Login</button>
                    </div>      
                    @endif
                    

                </div>
            </div>
        </nav>

        <div class="modal fade" id="modalregis" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="{{url('/registerCust')}}" method="post">
                            @csrf
                            <input type="hidden" id="level" name="level" value="3">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                            </div>
                            {{-- <div class="form-group">
                                <label for="hp">No Handphone</label>
                                <input type="text" class="form-control" id="hp" name="hp">
                            </div> --}}
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your data.</small>
                                <label class="form-check-label" for="exampleCheck1">Remember me</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modallogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action= "{{url('/loginCust')}}" method="post">
                            @csrf>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    aria-describedby="emailHelp">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                    anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Remember me</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Akhir Header -->

    <!-- List product -->
    <section id="list-product">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="text1"> <i color= "warning" class="fas fa-home"></i> Landing Page / Kategori / <strong>List Product</strong></h2>
                    <hr>
                </div>
            </div>
        
            <div class="row">
                <div class="col-lg-3">
                    <h2 class="text3">Premium Product for <strong>Every Need</strong></h2>
                </div>
            </div>

            <div class="row row9 text-center">
                <div class="col-lg-2">
                    <div class="card">
                        <img class="img-terlaris" src="/assets/promo3-removebg-preview.png" alt="kamera" width="100%" height="auto"
                            style="object-fit:cover;">
                        <div class="card-body">
                            <h5 class="card-title">Canon Fix</h5>
                            <p class="card-text">IDR 5,500,000.00</p>
                            <a href="#" class="btn btn-primary">Lihat Barang</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card">
                        <img class="img-terlaris" src="/assets/promo2-removebg-preview.png" alt="kamera" width="100%" height="auto"
                            style="object-fit:cover;">
                        <div class="card-body">
                            <h5 class="card-title">T-Shirt</h5>
                            <p class="card-text">IDR 300,000.00</p>
                            <a href="#" class="btn btn-primary">Lihat Barang</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card">
                        <img class="img-terlaris" src="/assets/promo3-removebg-preview.png" alt="kamera" width="100%" height="auto"
                            style="object-fit:cover;">
                        <div class="card-body">
                            <h5 class="card-title">Lensa</h5>
                            <p class="card-text">IDR 3,000,000.00</p>
                            <a href="#" class="btn btn-primary">Lihat Barang</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card">
                        <img class="img-terlaris" src="/assets/promo1-removebg-preview.png" alt="kamera" width="100%" height="88px"
                            style="object-fit:cover;">
                        <div class="card-body">
                            <h5 class="card-title">Nike Air Jordan</h5>
                            <p class="card-text">IDR 4,000,000.00</p>
                            <a href="#" class="btn btn-primary">Lihat Barang</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card">
                        <img src="/assets/promo2-removebg-preview.png" alt="kamera" width="100%" height="auto"
                            style="object-fit:cover;">
                        <div class="card-body">
                            <h5 class="card-title">T-Shirt</h5>
                            <p class="card-text">IDR 300,000.00</p>
                            <a href="#" class="btn btn-primary">Lihat Barang</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card">
                        <img src="/assets/promo3-removebg-preview.png" alt="kamera" width="100%" height="auto" style="object-fit:cover;">
                        <div class="card-body">
                            <h5 class="card-title">Tas Kamera</h5>
                            <p class="card-text">IDR 4,000,000.00</p>
                            <a href="#" class="btn btn-primary">Lihat Barang</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row row9 text-center pt-5">
                <div class="col-lg-2">
                    <div class="card">
                        <img class="img-terlaris" src="/assets/promo3-removebg-preview.png" alt="kamera" width="100%" height="auto"
                            style="object-fit:cover;">
                        <div class="card-body">
                            <h5 class="card-title">Canon Fix</h5>
                            <p class="card-text">IDR 5,500,000.00</p>
                            <a href="#" class="btn btn-primary">Lihat Barang</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card">
                        <img class="img-terlaris" src="/assets/promo2-removebg-preview.png" alt="kamera" width="100%" height="auto"
                            style="object-fit:cover;">
                        <div class="card-body">
                            <h5 class="card-title">T-Shirt</h5>
                            <p class="card-text">IDR 300,000.00</p>
                            <a href="#" class="btn btn-primary">Lihat Barang</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card">
                        <img class="img-terlaris" src="/assets/promo3-removebg-preview.png" alt="kamera" width="100%" height="auto"
                            style="object-fit:cover;">
                        <div class="card-body">
                            <h5 class="card-title">Lensa</h5>
                            <p class="card-text">IDR 3,000,000.00</p>
                            <a href="#" class="btn btn-primary">Lihat Barang</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card">
                        <img class="img-terlaris" src="/assets/promo1-removebg-preview.png" alt="kamera" width="100%" height="88px"
                            style="object-fit:cover;">
                        <div class="card-body">
                            <h5 class="card-title">Nike Air Jordan</h5>
                            <p class="card-text">IDR 4,000,000.00</p>
                            <a href="#" class="btn btn-primary">Lihat Barang</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card">
                        <img src="/assets/promo2-removebg-preview.png" alt="kamera" width="100%" height="auto"
                            style="object-fit:cover;">
                        <div class="card-body">
                            <h5 class="card-title">T-Shirt</h5>
                            <p class="card-text">IDR 300,000.00</p>
                            <a href="#" class="btn btn-primary">Lihat Barang</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card">
                        <img src="/assets/promo3-removebg-preview.png" alt="kamera" width="100%" height="auto" style="object-fit:cover;">
                        <div class="card-body">
                            <h5 class="card-title">Tas Kamera</h5>
                            <p class="card-text">IDR 4,000,000.00</p>
                            <a href="#" class="btn btn-primary">Lihat Barang</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row row9 text-center pt-5">
                <div class="col-lg-2">
                    <div class="card">
                        <img class="img-terlaris" src="/assets/promo3-removebg-preview.png" alt="kamera" width="100%" height="auto"
                            style="object-fit:cover;">
                        <div class="card-body">
                            <h5 class="card-title">Canon Fix</h5>
                            <p class="card-text">IDR 5,500,000.00</p>
                            <a href="#" class="btn btn-primary">Lihat Barang</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card">
                        <img class="img-terlaris" src="/assets/promo2-removebg-preview.png" alt="kamera" width="100%" height="auto"
                            style="object-fit:cover;">
                        <div class="card-body">
                            <h5 class="card-title">T-Shirt</h5>
                            <p class="card-text">IDR 300,000.00</p>
                            <a href="#" class="btn btn-primary">Lihat Barang</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card">
                        <img class="img-terlaris" src="/assets/promo3-removebg-preview.png" alt="kamera" width="100%" height="auto"
                            style="object-fit:cover;">
                        <div class="card-body">
                            <h5 class="card-title">Lensa</h5>
                            <p class="card-text">IDR 3,000,000.00</p>
                            <a href="#" class="btn btn-primary">Lihat Barang</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card">
                        <img class="img-terlaris" src="/assets/promo1-removebg-preview.png" alt="kamera" width="100%" height="88px"
                            style="object-fit:cover;">
                        <div class="card-body">
                            <h5 class="card-title">Nike Air Jordan</h5>
                            <p class="card-text">IDR 4,000,000.00</p>
                            <a href="#" class="btn btn-primary">Lihat Barang</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card">
                        <img src="/assets/promo2-removebg-preview.png" alt="kamera" width="100%" height="auto"
                            style="object-fit:cover;">
                        <div class="card-body">
                            <h5 class="card-title">T-Shirt</h5>
                            <p class="card-text">IDR 300,000.00</p>
                            <a href="#" class="btn btn-primary">Lihat Barang</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card">
                        <img src="/assets/promo3-removebg-preview.png" alt="kamera" width="100%" height="auto" style="object-fit:cover;">
                        <div class="card-body">
                            <h5 class="card-title">Tas Kamera</h5>
                            <p class="card-text">IDR 4,000,000.00</p>
                            <a href="#" class="btn btn-primary">Lihat Barang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <section id="footer">
        <div class="container">
            <div class="row row9">
                <div class="col-lg-6">
                    <img class="" src="{{asset('assets/Logo-removebg-preview (1).png')}}" width="40%" height="auto" alt="logo">
                    
                    <p style="font-size: 14px; text-align: justify;"> Sebagai Pusat Fashion Online di palembang,
                    kami menciptakan gaya tanpa batas dengan cara
                    memperluas jangkauan produk, mulai dari produk internasional hingga produk lokal dambaan.</p>
                </div>

                <div class="col-lg-2">
                    <h3>Layanan</h3>
                    <h5>Cara Pembelian</h5>
                    <h5>Barang Terlaris</h5>
                    <h5>Promo Hari Ini</h5>
                    <h5>Status Order</h5>
                </div>

                <div class="col-lg-2">
                    <h3>Layanan</h3>
                    <h5>Cara Pembelian</h5>
                    <h5>Barang Terlaris</h5>
                    <h5>Promo Hari Ini</h5>
                    <h5>Status Order</h5>
                </div>

                <div class="col-lg-2">
                    <h3>Layanan</h3>
                    <h5>Cara Pembelian</h5>
                    <h5>Barang Terlaris</h5>
                    <h5>Promo Hari Ini</h5>
                    <h5>Status Order</h5>
                </div>
            </div>
            <hr style="border: solid 1px rgba(245, 124, 0, 1);">
            <div class="row">
                <div class="col-lg-9">
                    <p style="font-size: smaller; padding-left: 30px;">Copyright &copy; 2021 PASARKITO , All Right Reserved</p>
                </div>
                <div class="col pr-0">
                    <i class="fab fa-instagram-square"></i>
                </div>  
                <div class="col">
                    <i class="fab fa-twitter-square"></i>
                </div>
                <div class="col pl-0">
                    <i class="fab fa-facebook-square"></i>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir footer -->

</body>

    <!-- owl carousel js-->
    <script src="./js/jquery.min.js"></script>
    <script src="./owlcarousel/owl.carousel.min.js"></script>
    <script src="./js/bootstrap.bundle.js"></script>
    <script src="./js/myscript.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <!-- <script src="./js/myscrollreveal.js"></script> -->

    <!-- icon fontawsome -->
    <script src="https://kit.fontawesome.com/b0b240269b.js" crossorigin="anonymous"></script>



</html>