<?php
/**
 * Created by Pizaini <pizaini@uin-suska.ac.id>
 * Date: 28/01/2020
 * Time: 13:17
 */
use App\Libs\AppHelpers;
$title = 'Profil';
$appendTitle = AppHelpers::appendTitle($title, true);
?>

@extends($appLayout)

@section('title', $appendTitle)

@section('page_title_top')
    <h4 class="page-title-main page_title_top_app">{{$title}}</h4>
@endsection

@section('main_content')
    <div class="main_content_app d-none">
        <!-- main app -->
        <div id="app" >
            <div class="wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            This is profil
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--Define your javascript below--}}
        <script type="text/javascript" src="{{asset('js/account/profil.js')}}"></script>
    </div>
@endsection
