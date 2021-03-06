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
        <div id="app">
            <vc-buku-search search-url="{{route('v1.buku.search')}}" query-param="<?=$searchQuery?>" detail-url="{{url('buku/detail')}}"></vc-buku-search>
        </div>
        {{--  Define x-template--}}
        <script type="text/x-template" id="vc-buku-search">
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
                    <!-- Page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="container-fluid">
                                <div class="text-center">
                                    <form class="col-lg-12" action="{{route('buku.search')}}" method="get" @submit.prevent="clickToSearch">
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
                    <div v-show="dataBuku.judul.data">
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
                            <div class="col-lg-4 col-md-6 mt-2 my-3" v-for="buku in dataBuku.judul.data">
                                <div class="text-center card h-100 px-3">
                                    <div class="mt-2">
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
                                        <b-button @click="loadPjax(buku.id)" class="btn btn-pink btn-rounded waves-effect waves-light">Lihat rincian</b-button>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                            <div class="row">
                                <div>
                                    <p>
                                        <a id="collapseLinkJudul" class="text-info" data-toggle="collapse" href="#collapseJudul"
                                           role="button" aria-expanded="false" aria-controls="collapseJudul" >
                                            Tampilkan selengkapnya
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-show="dataBuku.pengarang.data">
                        <div class="row pb-2 pt-2">
                            <div class="col-lg-4">
                                Menampilkan <em>@{{itemDisplay}} dari @{{totalItem}}</em> hasil pencarian.
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-lg-4 col-md-6 mt-2 my-3" v-for="buku in dataBuku.pengarang.data">
                                <div class="text-center card h-100 px-3">
                                    <div class="mt-2">
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
                                        <b-button @click="loadPjax(buku.id)" class="btn btn-pink btn-rounded waves-effect waves-light">Lihat rincian</b-button>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                            <div class="row">
                                <div class="justify-content-flex-end">
                                    <p>
                                        <a id="collapseLinkPengarang" class="text-info" data-toggle="collapse" href="#collapsePengarang"
                                           role="button" aria-expanded="false" aria-controls="collapsePengarang" >
                                            Tampilkan selengkapnya
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div v-show="dataBuku.penerbit.data">
                        <div class="row pb-2 pt-2">
                            <div class="col-lg-4">
                                Menampilkan <em>@{{itemDisplay}} dari @{{totalItem}}</em> hasil pencarian.
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-lg-4 col-md-6 mt-2 my-3" v-if="(dataBuku.penerbit.data !== null)"  v-for="buku in dataBuku.penerbit.data">
                                <div class="text-center card h-100 px-3">
                                    <div class="mt-2">
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
                                        <b-button @click="loadPjax(buku.id)" class="btn btn-pink btn-rounded waves-effect waves-light">Lihat rincian</b-button>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                            <div class="row">
                                <div>
                                    <p>
                                        <a id="collapseLinkPenerbit" class="text-info" data-toggle="collapse" href="#collapsePenerbit"
                                           role="button" aria-expanded="false" aria-controls="collapsePenerbit" >
                                            Tampilkan selengkapnya
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
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
        </script>
        {{--Define your javascript below--}}
        <script type="text/javascript" src="{{asset('js/buku/search.js')}}"></script>
    </div>
@endsection
