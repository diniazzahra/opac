<?php
use App\Libs\AppHelpers;
$title = 'Mengelola Buku';
$appendTitle = AppHelpers::appendTitle($title, true);
?>

@extends($appLayout)

@section('title', $appendTitle)

@section('main_content')
    <div class="main_content_app d-none">
        <link rel="stylesheet" type="text/css" href="{{asset('css/home/index.css')}}">
        <!-- main app -->
        <div id="app">
            <div class="wrapper">
                <div class="container-fluid mt-4">
                    <div class="row justify-content-center">
                        <div class = "card col-md-10">
                            {{-- <h4 class="card-header col-md-12">
                                Ubah Data Buku
                            </h4> --}}
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="label_no_induk_buku">No.Induk Buku</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" placeholder="No.Induk Buku">
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label class="col-sm-2 col-form-label" for="label_tajuk_subjek">Tajuk Subjek</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" placeholder="Tajuk Subjek">
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label class="col-sm-2 col-form-label" for="label_pengarang">Pengarang</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" placeholder="Pengarang">
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label class="col-sm-2 col-form-label" for="label_judul">Judul</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" placeholder="Judul">
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label class="col-sm-2 col-form-label" for="label_penerbit">Label Penerbit</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" placeholder="Penerbit">
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label class="col-sm-2 col-form-label" for="label_kota_terbit">Kota Terbit</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" placeholder="Kota Terbit">
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label class="col-sm-2 col-form-label" for="label_tahun_terbit">Tahun Terbit</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" placeholder="Tahun Terbit">
                                    </div>
                                </div>

                            {{-- Tampilkan Selengkapnya --}}
                                <div class="row">
                                    <label class="col-sm-2 col-form-label" for="label_rak_buku">Rak Buku :</label>
                                </div>

                                <div class="form-group row ">
                                    <label class="col-sm-2 col-form-label" for="label_call_number_1">Nomor Panggil 1</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" placeholder="Nomor Panggil 1">
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label class="col-sm-2 col-form-label" for="label_call_number_2">Nomor Panggil 2</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" placeholder="Nomor Panggil 2">
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label class="col-sm-2 col-form-label" for="label_call_number_3">Nomor Panggil 3</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" placeholder="Nomor Panggil 3">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="col-sm-2 col-form-label" for="label_jilid_ke">Jilid Ke</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" placeholder="Jilid">
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label class="col-sm-2 col-form-label" for="label_seri">Seri</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" placeholder="Seri">
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label class="col-sm-2 col-form-label" for="label_edisi_ke">Edisi Ke</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" placeholder="Edisi Ke">
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label class="col-sm-2 col-form-label" for="label_cetakan_ke">Cetakan Ke</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" placeholder="Cetakan Ke">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="col-sm-2 col-form-label" for="label_jumlah_halaman">Jumlah Halaman</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text"  placeholder="Jumlah Halaman">
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label class="col-sm-2 col-form-label" for="label_ilustrasi">Ilustrasi</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" placeholder="Ilustrasi">
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label class="col-sm-2 col-form-label" for="label_bibliografi">Bibliografi</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" placeholder="Bibliografi">
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label class="col-sm-2 col-form-label" for="label_isbn">ISBN</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" placeholder="ISBN">
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label class="col-sm-2 col-form-label" for="label_tinggi_buku">Tinggi Buku</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" placeholder="Tinggi Buku">
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label class="col-sm-2 col-form-label" for="label_diterima_dari">Diterima Dari</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" placeholder="Diterima Dari">
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label class="col-sm-2 col-form-label" for="label_jumlah_eksempelar">Jumlah Eksampelar</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" placeholder="Jumlah Eksampelar">
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label class="col-sm-2 col-form-label" for="label_selesai_diproses">Selesai Diproses</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" placeholder="Selesai Diproses">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="{{asset('js/buku/index.js')}}"></script>
    </div>


@endsection

