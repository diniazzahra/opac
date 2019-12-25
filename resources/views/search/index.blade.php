<?php
/**
 * Created by Pizaini <pizaini@uin-suska.ac.id>
 * Date: 22/12/2019
 * Time: 22:27
 *
 * @var string $searchQuery
 */
use App\Libs\AppHelpers;
$title = 'Pencarian';
$appendTitle = AppHelpers::appendTitle($title, true);
?>

@extends($appLayout)

@section('title', $appendTitle)

@section('main_content')
    <div class="main_content_app d-none">
        <div id="app" data-search-query="<?=$searchQuery?>" data-url-search="{{route('ajax.buku.search')}}">
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
                        <div class="col-12">
                            <div class="container-fluid">
                                <div class="text-center">
                                    <form class="col-lg-12" action="{{route('search.index')}}" method="get" @submit.prevent="clickToSearch">
                                        <div class="app-search-box">
                                            <div class="input-group bootstrap-touchspin">
                                                <input autofocus type="text" class="form-control" name="query" autocomplete="off" placeholder="Judul buku" id="searchQuery" v-model="searchQuery">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary bootstrap-touchspin-up bootstrap-touchspin-injected waves-effect" type="button" @click="clickToSearch"><i class="mdi mdi-cloud-search"></i> Cari</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2 pt-2">
                        <div class="col-lg-4">
                            Menampilkan <em>@{{itemDisplay}} dari @{{totalItem}}</em> hasil pencarian.
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->
                    <div class="row" :class="{'d-none': !isAjaxRunning}">
                        <div class="col-12">
                            <div class="text-center mb-2">
                                <b-spinner variant="pink" label="Spinning"></b-spinner>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4"  v-for="buku in dataBuku">
                            <div class="text-center card-box">
                                <div>
                                    <img src="{{asset('images/book-thumbnail.jpg')}}" class="rounded-circle avatar-xl img-thumbnail mb-2" alt="profile-image">

                                    <p class="text-muted font-13 mb-3">
                                       @{{ buku.judul }}
                                    </p>

                                    <div class="text-left">
                                        <p class="text-muted font-13"><strong>Pengarang :</strong> <span class="ml-2">@{{ buku.pengarang }}</span></p>

                                        <p class="text-muted font-13"><strong>Penerbit :</strong><span class="ml-2">@{{ buku.penerbit }}</span></p>

                                        <p class="text-muted font-13"><strong>Tahun terbit :</strong> <span class="ml-2">@{{ buku.tahun_terbit }}</span></p>

                                        <p class="text-muted font-13"><strong>Informasi :</strong> <span class="ml-2">@{{ buku.call_number_1 }} @{{ buku.call_number_2 }}</span></p>
                                    </div>
                                    <button type="button" class="btn btn-pink btn-rounded waves-effect waves-light">Lihat rincian</button>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>
                    <!-- Alert -->
                    <b-alert
                        v-model="showAlert"
                        class="position-fixed fixed-top m-0 rounded-0"
                        style="z-index: 2000;"
                        :variant="alertType"
                        dismissible>
                        @{{alertMessage}}
                    </b-alert>
                </div>
            </div>
        </div>

        {{--Define your javascript below--}}
        <script type="text/javascript" src="{{asset('js/search/index.js')}}"></script>
    </div>
@endsection
