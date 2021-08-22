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


<!-- owl carousel js-->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.js')}}"></script>
<script src="{{asset('js/myscript.js')}}"></script>
<script src="https://unpkg.com/scrollreveal"></script>
<!-- <script src="./js/myscrollreveal.js"></script> -->

<!-- icon fontawsome -->
<script src="https://kit.fontawesome.com/b0b240269b.js" crossorigin="anonymous"></script>

<script>
    $('.owl-carousel.detail').owlCarousel({
        loop: true,
        dots: true,
        margin: 10,
        autoplay: true,
        autoplaySpeed: 5000,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        slideTransition: 'linear',
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 3
            }
        }
    });

</script>