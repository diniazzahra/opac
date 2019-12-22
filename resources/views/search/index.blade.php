<?php
/**
 * Created by Pizaini <pizaini@uin-suska.ac.id>
 * Date: 22/12/2019
 * Time: 22:27
 */
use App\Libs\AppHelpers;
$title = 'Pencarian';
$appendTitle = AppHelpers::appendTitle($title, true);
?>

@extends($appLayout)

@section('title', $appendTitle)

@section('main_content')
    <div class="main_content_app d-none">
        <div id="app">
            <vc-search-index></vc-search-index>
        </div>

        {{--Define your template components below--}}
        <script type="text/x-template" id="vc-search-index">
            <div class="wrapper">
                <div class="container-fluid">
                    <!-- Page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                @include('partials.breadcrumb', ['breadcrumbs' => ['search.index' => 'Pencarian']])
                                <h4 class="page-title"><?=$title?></h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            @{{message}}
                        </div>
                    </div>
                </div>
            </div>
        </script>

        {{--Define your javascript below--}}
        <script type="text/javascript" src="{{asset('js/search/index.js')}}"></script>
    </div>
@endsection
