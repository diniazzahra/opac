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
                            <form action="{{route('buku.update', $buku->id)}}" method="POST">
                                {{-- @csrf --}}
                                @method('PATCH')
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="label_no_induk_buku">No.Induk Buku</label>
                                    <div class="col-md-10">
                                    <input class="form-control" type="text" name="no_induk_buku" value="{{$buku->no_induk_buku}}" placeholder="No.Induk Buku" >
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label class="col-sm-3 col-form-label" for="label_tajuk_subjek">Tajuk Subjek</label>
                                    <div class="col-md-10">
                                    <input class="form-control" type="text" name="tajuk_subjek" value ="{{$buku->tajuk_subjek}}" placeholder="Tajuk Subjek">
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label class="col-sm-3 col-form-label" for="label_pengarang">Pengarang</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="pengarang" value ="{{$buku->pengarang}}" placeholder="Pengarang">
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label class="col-sm-3 col-form-label" for="label_judul">Judul</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="judul" value ="{{$buku->judul}}" placeholder="Judul">
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label class="col-sm-3 col-form-label" for="label_penerbit">Penerbit</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="penerbit" value ="{{$buku->penerbit}}" placeholder="Penerbit">
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label class="col-sm-3 col-form-label" for="label_kota_terbit">Kota Terbit</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="kota_terbit" value ="{{$buku->kota_terbit}}" placeholder="Kota Terbit">
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label class="col-sm-3 col-form-label" for="label_tahun_terbit">Tahun Terbit</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="tahun_terbit" value ="{{$buku->tahun_terbit}}" placeholder="Tahun Terbit">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <p>
                                            <a id="collapseLinkDetail" class="text-info" data-toggle="collapse" href="#collapseDetail"
                                               role="button" aria-expanded="false" aria-controls="collapseDetail">
                                                Tampilkan selengkapnya
                                            </a>
                                        </p>

                                    </div>
                                </div>

                            {{-- Tampilkan Selengkapnya --}}
                                <div class="row">
                                    <label class="col-sm-3 col-form-label" for="label_rak_buku">Rak Buku :</label>
                                </div>

                                <div class="form-group row ">
                                    <label class="col-sm-3 col-form-label" for="label_call_number_1">Nomor Panggil 1</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="call_number_1" value ="{{$buku->call_number_1}}" placeholder="Nomor Panggil 1">
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label class="col-sm-3 col-form-label" for="label_call_number_2">Nomor Panggil 2</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="call_number_2" value ="{{$buku->call_number_2}}" placeholder="Nomor Panggil 2">
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label class="col-sm-3 col-form-label" for="label_call_number_3">Nomor Panggil 3</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="call_number_3" value ="{{$buku->call_number_3}}" placeholder="Nomor Panggil 3">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="col-sm-3 col-form-label" for="label_jilid_ke">Jilid Ke</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="jilid_ke" value ="{{$buku->jilid_ke}}" placeholder="Jilid">
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label class="col-sm-3 col-form-label" for="label_seri">Seri</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="seri" value ="{{$buku->seri}}" placeholder="Seri">
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label class="col-sm-3 col-form-label" for="label_edisi_ke">Edisi Ke</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="edisi_ke" value ="{{$buku->edisi_ke}}" placeholder="Edisi Ke">
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label class="col-sm-3 col-form-label" for="label_cetakan_ke">Cetakan Ke</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="cetakan_ke" value ="{{$buku->cetakan_ke}}" placeholder="Cetakan Ke">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="col-sm-3 col-form-label" for="label_jumlah_halaman">Jumlah Halaman</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="jumlah_halaman" value ="{{$buku->jumlah_halaman}}" placeholder="Jumlah Halaman">
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label class="col-sm-3 col-form-label" for="label_ilustrasi">Ilustrasi</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="ilustrasi" value ="{{$buku->ilustrasi}}" placeholder="Ilustrasi">
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label class="col-sm-3 col-form-label" for="label_bibliografi">Bibliografi</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="bibliografi" value ="{{$buku->bibliografi}}" placeholder="Bibliografi">
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label class="col-sm-3 col-form-label" for="label_isbn">ISBN</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="isbn" value ="{{$buku->isbn}}" placeholder="ISBN">
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label class="col-sm-3 col-form-label" for="label_tinggi_buku">Tinggi Buku</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="tinggi_buku" value ="{{$buku->tinggi_buku}}" placeholder="Tinggi Buku">
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label class="col-sm-3 col-form-label" for="label_diterima_dari">Diterima Dari</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="diterima_dari" value ="{{$buku->diterima_dari}}" placeholder="Diterima Dari">
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label class="col-sm-3 col-form-label" for="label_jumlah_eksempelar">Jumlah Eksampelar</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="jumlah_eksampelar" value ="{{$buku->jumlah_eksampelar}}" placeholder="Jumlah Eksampelar">
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label class="col-sm-3 col-form-label" for="label_selesai_diproses">Selesai Diproses</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="selesai_diproses" value ="{{$buku->selesai_diproses}}" placeholder="Selesai Diproses">
                                    </div>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-md-10">
                                            <button type="submit" class="btn btn-sm btn-lighten-success" style="float: right">Simpan Perubahan</button>
                                            <a href="{{route('buku.detail', $buku->id)}}" class="btn btn-sm btn-lighten-secondary mr-1" style="float: right">Kembali</a>
                                        </div>
                                    </div>

                                </div>
                            </form>
                                {{-- @click="updateBuku({{$buku->id}})" --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="{{asset('js/buku/edit.js')}}"></script>
    </div>


@endsection

