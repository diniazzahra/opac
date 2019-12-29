<?php
/**
 * Created by Pizaini <pizaini@uin-suska.ac.id>
 * Date: 28/12/2019
 * Time: 20:05
 */

use App\Libs\AppHelpers;

$title = 'Development with HTML';
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


                </div>
            </div>
        </div>
        {{-- Your Vue components template--}}


        {{--Your javascript--}}
        <script type="text/javascript" src="{{asset('js/development/html.js')}}"></script>
    </div>
@endsection
