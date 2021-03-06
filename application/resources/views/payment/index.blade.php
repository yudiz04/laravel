<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landingpage</title>

    <!-- my css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/mobile.css')}}">

    <!-- bootstrap -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('owlcarousel/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('owlcarousel/assets/owl.theme.default.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
    
<!-- Metode -->
<section id="metode">
    <div class="container">
        <div class="row row1">
            <div class="col col1">
                <h4>Metode Pembayaran</h4>
            </div>
        </div>

        <div class="row row2 bg-light">
            <div class=col-lg-6>
                <p>Invoice</p>
            </div>
            <div class="col-lg">
                <p>{{$transaction[0]->no_invoice}}</p>
            </div>
        </div>
        <br>
        <div class="row row2 bg-light">
            <div class=col-lg-6>
                <p>Batas Waktu Pembayaran</p>
            </div>
            <div class="col-lg">
                <p>12.00 WIB</p>
            </div>
            <div class="col-lg">
                <p>12/11/2021</p>
            </div>
        </div>

        <div class="row row2 bg-light mt-4">
            <div class=col-lg-6>
                <p>Transfer Bank</p>
            </div>
            <div class="col-lg">
                <p>{{$transaction[0]->bank->no_rekening}}</p>
            </div>
            <div class="col-lg text-center">
                <button type="button" class="btn btn-outline-warning">Salin</button>
            </div>
        </div>

        <div class="row row2 bg-light mt-4">
            <div class=col-lg-6>
                <p>Total Belanja</p>
            </div>
            <div class="col-lg">
                <p>{{$transaction[0]->total}}</p>
            </div>
        </div>

        <div class="row row2 bg-light mt-4">
            <div class=col-lg-6>
                <p>Ongkir</p>
            </div>
            <div class="col-lg">
                <p>{{$transaction[0]->courier->ongkir}}</p>
            </div>
        </div>

        <div class="row row2 bg-light mt-4">
            <div class=col-lg-6>
                <p>Total Pembayaran</p>
            </div>
            <div class="col-lg">
                <p>{{$transaction[0]->total+$transaction[0]->courier->ongkir}}</p>
            </div>
            <div class="col-lg text-center">
                <button type="button" class="btn btn-outline-warning">Salin</button>
            </div>
        </div>
        <br>
        <br>
        <div class="row row3">
            <div class="col-lg-4"></div>
            <div class="col-lg-4 col2">
                <p class="text-warning"><strong>Upload Bukti Bayar</strong></p>
            </div>
            <div class="col-lg-4"></div>
        </div>

        <div class="row text-center">
            <form action="{{ url('/transaction/'.$transaction[0]->id) }}" method="POST" enctype="multipart/form-data">
                @csrf 
                @method('patch')
            <div class="col-lg text-center" >
                <input type="file" class="form-control" name="struk" id="struk">
                <button type="submit" class="btn btn-outline-secondary mt-3" data-toggle="modal"
                data-target="#modalupload" for="struk">Upload</button>
            </div>
            </form>
        </div>

        {{-- <div class="modal fade" id="modalupload" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Bukti Bayar</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                          <label for="exampleFormControlFile1">Example file input</label>
                          <input type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                      </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Upload</button>
                </div>
              </div>
            </div>
          </div> --}}
          
        
        <div class="row">
            <div class="col-lg text-center">
                <a href="./sukses.html" target="_blank" type="button" class="btn btn-primary mt-3">Kirim</a>
            </div>
            </div>
        </div> 
    </div>
</section>
<!-- Akhir metode -->

