@extends('layouts.main')
@section('title')
    Login | {{ config('app.name', 'Laravel') }}
@endsection
@section('body')
    <div class="home-btn d-none d-sm-block">
        <a href="{{ route('home') }}" title="Home"><i class="fas fa-home h2 text-dark"></i></a>
    </div>
    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="text-center">
                        <a class="nav-link" href="{{ route('auth.login.form') }}">
                            <span><img src="{{asset('images/logo.png') }}" alt="Logo" height="64"></span>
                        </a>
                        <p class="text-muted mt-2 mb-4">{{config('app.name')}}</p>
                    </div>
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="text-center mb-4">
                                <h4 class="text-uppercase mt-0">Sign In</h4>
                            </div>
                            @if ($message = Session::get('auth.error'))
                                <div class="alert alert-warning alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    {{ $message }}
                                </div>
                            @endif
                            <p class="text-muted">Sign in menggunakan:</p>
                            <ul class="list-group mb-0 user-list">
                                <li class="list-group-item">
                                    <a href="{{route('auth.login.redirect')}}" class="user-list-item">
                                        <div class="user avatar-sm float-left mr-2">
                                            <img src="{{asset('images/logo.png')}}" alt="logo" class="img-fluid rounded-circle">
                                        </div>
                                        <div class="user-desc">
                                            <h5 class="name mt-0 mb-1">AULIA ID</h5>
                                            <p class="desc text-muted mb-0 font-12">Single identity STAI Auliaurrasyidin</p>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <hr>
                            <footer class="blockquote-footer text-muted">Autentikasi single identity. <a href="{{config('services.laravelpassport.host').'/tentang'}}">Pelajari lebih lanjut</a> </footer>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->


    </div>

    @include('partials.footer_large')
@endsection
