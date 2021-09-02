
<style>
.icon {
    cursor: pointer;
    margin-right: 50px;
    line-height: 60px
}

.icon span {
    background: #f00;
    padding: 7px;
    border-radius: 50%;
    color: #fff;
    vertical-align: top;
    margin-left: -25px
}

.icon img {
    display: inline-block;
    width: 26px;
    margin-top: 4px
}

.icon:hover {
    opacity: .7
}
        #box .notification {
            width: 300px;
            height: 0px;
            opacity: 0;
            position: absolute;
            top: 63px;
            right: 62px;
            border-radius: 5px 0px 5px 5px;
            background-color: #fff;
            box-shadow: 0px 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
    
        /* .notifications h2 {
    font-size: 14px;
    padding: 10px;
    border-bottom: 1px solid #eee;
    color: #999
    }
    
    .notifications h2 span {
    color: #f00
    } */
    
    .notifications-item {
    display: flex;
    border-bottom: 1px solid #eee;
    padding: 6px 9px;
    margin-bottom: 0px;
    cursor: pointer
    }
    
    .notifications-item:hover {
    background-color: #eee
    }
    
    .notifications-item img {
    display: block;
    width: 50px;
    height: 50px;
    margin-right: 9px;
    border-radius: 50%;
    margin-top: 2px
    }
    
    .notifications-item .text h4 {
    color: #777;
    font-size: 16px;
    margin-top: 3px
    }
    
    .notifications-item .text p {
    color: #aaa;
    font-size: 12px
    }
    </style>


<!-- Navbar -->
<section id="navbar">
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}"><img
                    src="{{ asset('assets/Logo-removebg-preview (1).png') }}" width="100%"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="col-lg-6">
                    <input type="text" placeholder="Cari apa">
                </div>
                <div class="col">
                    <div class="row justify-content-center">
                        <a href="{{ url('/cart') }}"><img class="icon" src="{{ asset('assets/scart.png') }}"
                                width="23px" height="auto">
                            @if (Auth::user())
                                @if (Keranjang::hitung() > 0)
                                    <sup><span
                                            class="badge badge-pill badge-warning">{{ Keranjang::hitung() }}</span></sup>
                                @endif
                            @endif
                        </a>
                    </div>
                </div>
                <div class="col-mt-2">
                    @if (Auth::user())
                        <div id="notif">
                            <img src="{{ asset('assets/notification.svg') }}" width="23px"> 
                        </div>
                            
                                @foreach (Keranjang::isi() as $item)
                                
                                    <div class="text" id="box">
                                        <p>{{ $item->isi }}</p>
                                    </div>
                                
                                @endforeach
            
                        @if (Keranjang::notif() > 0)
                            <sup><span type="button" class="dropdown-toggle badge badge-warning" href="#" id="navbarDropdownMenuLink"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Keranjang::notif() }}</span></sup>
                        @endif
                    @endif
                </div>

                @if (Auth::user())
                    <div class="col">
                        <a href="#" role="button" class="btn btn1">{{ Auth::user()->name }}</a>
                    </div>
                    <div class="col">
                        <a href="{{ url('/logoutCust') }}" role="button" class="btn btn1">Logout</a>
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
                    <form action="{{ url('/registerCust') }}" method="post">
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
                    <form action="{{ url('/loginCust') }}" method="post">
                        @csrf
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
<!-- Navbar -->

<script>
    $(document).ready(function(){

    var down = false;

    $('#bell').click(function(e){

    var color = $(this).text();

    if(down){

    $('#box').css('height','0px');
    $('#box').css('opacity','0'); 
    down = false;
    }else{

    $('#box').css('height','auto');
    $('#box').css('opacity','1');
    down = true;

    }

    });

    });

</script>

