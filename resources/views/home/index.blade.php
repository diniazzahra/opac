<?php
use App\Libs\AppHelpers;
$title = 'Perpustakaan';
$appendTitle = AppHelpers::appendTitle($title, true);
?>

@extends($appLayout)

@section('title', $appendTitle)

@section('main_content')
    <div class="main_content_app d-none">
        <link rel="stylesheet" type="text/css" href="{{asset('css/home/index.css')}}">
        <!-- main app -->
        <div id="app" >
            <vc-home-index url-count-all="{{route('ajax.buku.count-all')}}"></vc-home-index>
        </div>
        {{--Templates--}}
        <script type="text/x-template" id="vc-home-index">
            <div>
                <!-- Page content -->
                <div class="wrapper"></div>
                <section class="bg-home1 bg-home">
                    <div class="wrapper pt-0">
                        <div class="container-fluid">
                            <div class="row justify-content-center">
                                <form class="app-search col-12 col-lg-8" action="{{route('buku.search')}}" method="get">
                                    <div class="app-search-box">
                                        <div class="input-group bootstrap-touchspin">
                                            <input autofocus type="text" class="form-control" name="query" autocomplete="off" placeholder="Judul, Pengarang atau Penerbit Buku">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary bootstrap-touchspin-up bootstrap-touchspin-injected waves-effect" type="submit"><i class="mdi mdi-cloud-search"></i> Cari</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="text-center">
                                        <button class="btn btn-purple waves-effect btn-rounded text-white" data-target="#modalAdvandedSearch" data-toggle="modal"><i class="mdi mdi-menu"></i>
                                            Pencarian
                                            Spesifik
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="section">
                    <div class="container-fluid">
                        <h3 class="text-center mb-5 pt-3">Koleksi buku</h3>
                        <div class="row" id="counter">
                            <div class="col-lg-4 col-sm-6">
                                <div class="text-center p-3">
                                    <div class="counter-icon mb-4">
                                        <i class="mdi mdi-library-books display-4"></i>
                                    </div>
                                    <div class="counter-content text-white">
                                        <h2 class="counter-value mb-3" :data-count="totalBuku">@{{totalBuku}}</h2>
                                        <h5 class="counter-name">Total buku</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-6">
                                <div class="text-center p-3">
                                    <div class="counter-icon mb-4">
                                        <i class="mdi mdi-library-books display-4"></i>
                                    </div>
                                    <div class="counter-content text-white">
                                        <h2 class="counter-value mb-3" data-count="6931">608</h2>
                                        <h5 class="counter-name">Buku baru</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="text-center p-3">
                                    <div class="counter-icon mb-4">
                                        <i class="mdi mdi-library-books display-4"></i>
                                    </div>
                                    <div class="counter-content text-white">
                                        <h2 class="counter-value mb-3" data-count="800">2</h2>
                                        <h5 class="counter-name">Buku dipinjam</h5>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>

                <div class="modal fade" id="modalAdvandedSearch">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="modalAdvandedSearch">Pencarian lanjutan</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{route('buku.advSearch')}}"method="get">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <div class="custom-control custom-switch pt-1">
                                                <input type="checkbox" @change="enable('judul', 'inputjudul')" class="custom-control-input" id="judul" checked="true">
                                                <label class="custom-control-label" for="judul">Judul Buku</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-10">
                                            <input type="text" class="form-control" id="inputjudul" name="inputjudul" placeholder="Judul Buku" autofocus>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <div class="custom-control custom-switch pt-1">
                                                <input type="checkbox" @change="enable('penerbit', 'inputpenerbit')" class="custom-control-input" id="penerbit">
                                                <label class="custom-control-label" for="penerbit">Penerbit</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-10">
                                            <input type="text" class="form-control" id="inputpenerbit" name="inputpenerbit" placeholder="Penerbit" disabled>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <div class="custom-control custom-switch pt-1">
                                                <input type="checkbox" @change="enable('pengarang', 'inputpengarang')" class="custom-control-input" id="pengarang">
                                                <label class="custom-control-label" for="pengarang">Pengarang</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-10">
                                            <input type="text" class="form-control" id="inputpengarang" name="inputpengarang" placeholder="Pengarang" disabled>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <div class="custom-control custom-switch pt-1">
                                                <input type="checkbox" @change="enable('tahun_terbit', 'inputtahun_terbit')" class="custom-control-input" id="tahun_terbit">
                                                <label class="custom-control-label" for="tahun_terbit">Tahun Terbit</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-10">
                                            <input type="text" class="form-control" id="inputtahun_terbit" name="inputtahun_terbit" placeholder="Tahun Terbit" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                    <button type="button" class="btn btn-lighten-warning" data-dismiss="modal">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </script>
        {{--Define your javascript below--}}
        <script type="text/javascript" src="{{asset('js/home/index.js')}}"></script>
    </div>
@endsection
