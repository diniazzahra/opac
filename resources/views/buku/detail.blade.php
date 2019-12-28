<?php
/**
 * Created by Pizaini <pizaini@uin-suska.ac.id>
 * Date: 28/12/2019
 * Time: 12:56
 */
use App\Libs\AppHelpers;
$title = 'Rincian buku';
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
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                @include('partials.breadcrumb', ['breadcrumbs' => ['buku.search' => 'Pencarian']])
                                <h4 class="page-title"><?=$title?></h4>
                            </div>
                        </div>
                    </div>
                    <!-- page content -->
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <b-button pill variant="success" href="{{url()->previous()}}"><i class=" mdi mdi-chevron-double-left"></i> Kembali ke hasil pencarian</b-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--Define your javascript below--}}
        <script type="text/javascript" src="{{asset('js/buku/detail.js')}}"></script>
    </div>
@endsection
