<?php
use App\Libs\AppHelpers;
$title = 'Menambah Data Buku';
$appendTitle = AppHelpers::appendTitle($title, true);
?>

@extends($appLayout)

@section('title', $appendTitle)

@section('main_content')
    <div class="main_content_app d-none">
        <link rel="stylesheet" type="text/css" href="{{asset('css/home/index.css')}}">
        <!-- main app -->
        <div class="app">
            <div class="wrapper">
                <div class="container-fluid mt-4">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="label_no_induk_buku">No.Induk Buku</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" v-model="buku.no_induk_buku" placeholder="No.Induk Buku">
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label" for="label_rak_buku">Rak Buku :</label>
                    </div>

                    <div class="form-group row ">
                        <label class="col-sm-2 col-form-label" for="label_call_number_1">Nomor Panggil 1</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" v-model="buku.call_number_1" placeholder="Nomor Panggil 1">
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label class="col-sm-2 col-form-label" for="label_call_number_2">Nomor Panggil 2</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" v-model="buku.call_number_2" placeholder="Nomor Panggil 2">
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label class="col-sm-2 col-form-label" for="label_call_number_3">Nomor Panggil 3</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" v-model="buku.call_number_3" placeholder="Nomor Panggil 3">
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label class="col-sm-2 col-form-label" for="label_tajuk_subjek">Tajuk Subjek</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" v-model="buku.tajuk_subjek" placeholder="Tajuk Subjek">
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label class="col-sm-2 col-form-label" for="label_pengarang">Pengarang</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" v-model="buku.pengarang" placeholder="Pengarang">
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label class="col-sm-2 col-form-label" for="label_judul">Judul</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" v-model="buku.judul" placeholder="Judul">
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label class="col-sm-2 col-form-label" for="label_jilid_ke">Jilid Ke</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" v-model="buku.jilid_ke" placeholder="Jilid">
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label class="col-sm-2 col-form-label" for="label_seri">Seri</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" v-model="buku.seri" placeholder="Seri">
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label class="col-sm-2 col-form-label" for="label_edisi_ke">Edisi Ke</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" v-model="buku.edisi_ke" placeholder="Edisi Ke">
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label class="col-sm-2 col-form-label" for="label_cetakan_ke">Cetakan Ke</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" v-model="buku.cetakan_ke" placeholder="Cetakan Ke">
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label class="col-sm-2 col-form-label" for="label_penerbit">Label Penerbit</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" v-model="buku.penerbit" placeholder="Penerbit">
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label class="col-sm-2 col-form-label" for="label_kota_terbit">Kota Terbit</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" v-model="buku.kota_terbit" placeholder="Kota Terbit">
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label class="col-sm-2 col-form-label" for="label_tahun_terbit">Tahun Terbit</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" v-model="buku.tahun_terbit" placeholder="Tahun Terbit">
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label class="col-sm-2 col-form-label" for="label_jumlah_halaman">Jumlah Halaman</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" v-model="buku.jumlah_halaman" placeholder="JUmlah Halaman">
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label class="col-sm-2 col-form-label" for="label_ilustrasi">Ilustrasi</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" v-model="buku.ilustrasi" placeholder="Ilustrasi">
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label class="col-sm-2 col-form-label" for="label_bibliografi">Bibliografi</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" v-model="buku.bibliografi" placeholder="Bibliografi">
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label class="col-sm-2 col-form-label" for="label_isbn">ISBN</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" v-model="buku.label_isbn" placeholder="ISBN">
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label class="col-sm-2 col-form-label" for="label_tinggi_buku">Tinggi Buku</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" v-model="buku.tinggi_buku" placeholder="Tinggi Buku">
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label class="col-sm-2 col-form-label" for="label_diterima_dari">Diterima Dari</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" v-model="buku.diterima_dari" placeholder="Diterima Dari">
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label class="col-sm-2 col-form-label" for="label_jumlah_eksempelar">Jumlah Eksampelar</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" v-model="buku.jumlah_eksampelar" placeholder="Jumlah Eeksampelar">
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label class="col-sm-2 col-form-label" for="label_selesai_diproses">Selesai Diproses</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" v-model="buku.selesai_diproses" placeholder="Selesai Diproses">
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <script type="text/javascript" src="{{asset('js/buku/detail.js')}}"></script>
    </div>


@endsection
