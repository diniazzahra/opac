<?php
/**
 * Created by Pizaini <pizaini@uin-suska.ac.id>
 * Date: 22/12/2019
 * Time: 22:27
 *
 * @var string $searchQuery
 */
use App\Libs\AppHelpers;
$title = 'Create new notif';
$appendTitle = AppHelpers::appendTitle($title, true);
?>

@extends($appLayout)

@section('title', $appendTitle)

@section('main_content')
    <div class="main_content_app d-none">
        <div id="app">
            <div class="wrapper">
                <div class="container-fluid">
                    <!-- Page title -->
                    <!-- <h4 class="header-title mt-3 mb-3 p-3 mb-2 rounded-top" sty le="color:#1B3A57">Compose Notifikasi</h4> -->
                    <form action="{{ route('notif.store') }}" method="POST" novalidate="" class="mt-3">
                    @csrf
                    <div class="card" style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                        <div class="card-body">
                            <div class="header-title pl-5 pt-4 pb-3 mt-2">Notifikasi</div>
                            <div class="form-group pl-5 pr-5">
                                <label for="title" class="header-title">Judul Notifikasi</label>
                                <div class="input-group input-group-sm mb-3 ">
                                    <input type="text" id="title" name="title" class="form-control "
                                        aria-label="Sizing example input" placeholder="Masukkan judul Notifikasi... " required=""
                                        aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </div>

                            <div class="form-group pl-5 pr-5">
                                <label for="body" class="header-title  subJudulNot ">Text Notifikasi</label>
                                <div class="input-group input-group-sm mb-3">
                                    <input type="text" id="body" name="body" class="form-control "
                                        aria-label="Sizing example input" placeholder="Masukkan text Notifikasi... " required=""
                                        aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </div>

                            <!-- <div class="header-title pl-5 pt-4 pb-3 judulNot">Target</div>
                            <div class="form-group pl-5 pr-5">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                        role="tab" aria-controls="pills-home" aria-selected="true">User Segment</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                        role="tab" aria-controls="pills-profile" aria-selected="false">Topic</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                        aria-labelledby="pills-home-tab">
                                        <select class="form-control btn-sm" name="target">
                                            <option>-- Pilih User --</option>
                                            <option name="rute">ambil dari database</option>
                                        </select>
                                    </div>
                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                        aria-labelledby="pills-profile-tab">
                                        <input type="text" name="target" class="form-control "
                                            aria-label="Sizing example input" placeholder="Masukkan Topic... " required=""
                                            aria-describedby="inputGroup-sizing-sm">
                                    </div>
                                </div>
                            </div>

                            <div class="header-title pl-5 pt-4 pb-3 judulNot">Opsi Tambahan (Opsional)</div>
                            <div class="form-group pl-5 pr-5">
                                <label for="halamanTuj" class="header-title  subJudulNot ">Halaman Tujuan</label>
                                <div class="input-group input-group-sm mb-3 ">
                                    <select class="form-control btn-sm" id="halamanTuj" name="halamanTuj">
                                        <option>-- Pilih Halaman --</option>
                                        <option name="halamanTuj">ambil dari database</option>
                                    </select>
                                </div>
                            </div> -->

                            <div class="form-group text-right pt-4 pl-5 pr-5">
                                <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                                    Kirim Notifikasi
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>

        {{--Define your javascript below--}}
        <script type="text/javascript" src="{{asset('js/notification/create.js')}}"></script>
    </div>

@endsection
