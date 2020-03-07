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
                        <div class = "card">
                            <div class="card-body">
                                <a href="{{ route('buku.create') }}" class="btn btn-lighten-dark waves-effect width-md waves-inverse">+ Tambah Data Buku</a>
                                <div class="row mt-2">
                                    <div class="col">
                                        <div class="table-responsive">
                                            <table id="datatable" class="table mb-0">
                                                <thead class="thead-dark">
                                                <tr>
                                                    <th>No</th>
                                                    <th class="col-lg-2 text-center">No Induk Buku</th>
                                                    <th class="text-center">Pengarang</th>
                                                    <th class="text-center">Judul</th>
                                                    <th class="text-center">Penerbit</th>
                                                    <th class="col-lg-3 text-center">Aksi</th>
                                                </tr>
                                                </thead>

                                                <tbody>

                                                <tr v-for="buku, index in dataBuku">
                                                    <th scope="row">@{{index}}</th>
                                                    <td>@{{buku.no_induk_buku}}</td>
                                                    <td>@{{buku.pengarang}}</td>
                                                    <td>@{{buku.judul}}</td>
                                                    <td>@{{buku.penerbit}}</td>
                                                    <td>
                                                    <a href="#" class="btn btn-icon waves-effect btn-warning"><i class="far fa-eye"></i></a>
                                                        <a href="#" @click="deleteBuku(buku.id)" class="btn btn-icon waves-effect btn-danger"><i class="fas fa-trash"></i></a>
                                                    </td>
                                                </tr>

                                                </tbody>
                                            </table>
                                        </div>
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

