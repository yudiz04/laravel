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
                    <a class="#" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="icon" href="#" src="{{ asset('assets/notification.svg') }}" width="23px"> </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach (Keranjang::isi() as $item)
                            <a class="dropdown-item" href="#">{{ $item->isi }}</a>
                            <div class="dropdown-divider"></div>
                        @endforeach
                    </div>

                   
                        @if (Keranjang::notif() > 0)
                            <sup><span class="badge badge-pill badge-warning">{{ Keranjang::notif() }}</span></sup>
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
