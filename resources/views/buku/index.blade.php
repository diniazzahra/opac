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
                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <h3 class="mt-0 header-title"><b>Data Buku</b></h3>
                                <a href="{{ route('buku.create') }}" class="mt-3 mb-2 btn btn-lighten-secondary waves-effect width-md waves-inverse">+ Tambah Data Buku</a>
                                <div class="responsive-table-plugin">
                                <div class="table-rep-plugin">
                                <div class="table-responsive" data-pattern="priority-columns">
                                <table id="datatable" class="table table-bordered table-bordered dt-responsive nowrap fixed">
                                    <thead>
                                    <tr>
                                        <th scope="col">No. Induk Buku</th>
                                        <th scope="col">Pengarang</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Penerbit</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($buku as $data)
                                    <tr>
                                        <td>{{$data->no_induk_buku}}</td>
                                        <td>{{$data->pengarang}}</td>
                                        <td>{{$data->judul}}</td>
                                        <td>{{$data->penerbit}}</td>
                                        <td>
                                            <a href="{{route('buku.detail',$data->id)}}" class="btn btn-icon waves-effect btn-warning"><i class="far fa-eye"></i></a>
                                            <a href="#" @click="deleteBuku({{$data->id}})" class="btn btn-icon waves-effect btn-danger"><i class="fas fa-trash"></i></a>
                                        </td>

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

                  </div>
            </div>
        </div>
        <script type="text/javascript" src="{{asset('js/buku/index.js')}}"></script>
    </div>


@endsection

