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
        <div class="app">
            <div class="wrapper">
                <div class="container-fluid mt-4">
                    <a href="{{ route('buku.create') }}" class="btn btn-lighten-dark waves-effect  width-md waves-inverse">+ Tambah Data Buku</a>
                    <div class="row mt-2">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>No Induk Buku</th>
                                        <th>Pengarang</th>
                                        <th>Judul</th>
                                        <th>Penerbit</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($buku as $book)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$book->no_induk_buku}}</td>
                                        <td>{{$book->pengarang}}</td>
                                        <td>{{$book->judul}}</td>
                                        <td>{{$book->penerbit}}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="{{asset('js/buku/detail.js')}}"></script>
    </div>


@endsection

