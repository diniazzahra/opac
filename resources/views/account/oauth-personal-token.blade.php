<?php
use App\Libs\AppHelpers;
$title = 'OAuth Personal Access Token';
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
                            <vc-account-personal-token></vc-account-personal-token>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--Templates--}}
        <script type="text/x-template" id="vc-account-personal-token">
            <div>
                <div class="card-box">
                    <div class="float-right">
                        <button type="button" class="btn btn-purple btn-rounded width-md waves-effect waves-light" @click="showCreateTokenForm">Create New Token</button>
                    </div>
                    <h4 class="header-title mt-0">Personal Access Tokens</h4>
                    <p class="text-muted font-13">Access token untuk mengakses data Anda di pada sistem ini</p>
                    <!-- Current Clients -->
                    <p class="mb-0" v-if="tokens.length === 0">
                        No personal access token
                    </p>
                    <table class="table mb-0" v-if="tokens.length > 0">
                        <thead class="thead-light">
                        <tr>
                            <th>Name</th>
                            <th>Created at</th>
                            <th>Expire at</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="token in tokens">
                            <td>
                                @{{ token.name }}
                            </td>
                            <td>
                                @{{token.created_at}}
                            </td>
                            <td>
                                @{{token.expires_at}}
                            </td>
                            <td>
                                <a href="javascript:void(0);" @click="revoke(token)">
                                    <span class="badge badge-danger badge-pill float-left">Revoke <i class="mdi mdi-block-helper"></i> </span>
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <hr>
                    <h4 class="header-title mt-0">Informasi</h4>
                    <p class="text-muted font-13">Personal akses token dapat ditambahkan sesuai kebutuhan. Kami dapat mengurangi atau mencabut akses (revoke) token yang sudah dibuat tanpa informasi sebelumnya.</p>
                </div>

                <!-- Create Token Modal -->
                <div class="modal fade" id="modal-create-token" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">
                                    Create Token
                                </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>

                            <div class="modal-body">
                                <!-- Form Errors -->
                                <div class="alert alert-danger" v-if="form.errors.length > 0">
                                    <p class="mb-0"><strong>Whoops!</strong> Something went wrong!</p>
                                    <br>
                                    <ul>
                                        <li v-for="error in form.errors">
                                            @{{ error }}
                                        </li>
                                    </ul>
                                </div>

                                <!-- Create Token Form -->
                                <form role="form" @submit.prevent="store">
                                    <!-- Name -->
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label">Name</label>

                                        <div class="col-md-6">
                                            <input id="create-token-name" type="text" class="form-control" name="name" v-model="form.name">
                                        </div>
                                    </div>

                                    <!-- Scopes -->
                                    <div class="form-group row" v-if="scopes.length > 0">
                                        <label class="col-md-4 col-form-label">Scopes</label>

                                        <div class="col-md-6">
                                            <div v-for="scope in scopes">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"
                                                               @click="toggleScope(scope.id)"
                                                               :checked="scopeIsAssigned(scope.id)">
                                                        @{{ scope.id }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- Modal Actions -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                <button type="button" class="btn btn-primary" @click="store">
                                    Create
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Access Token Modal -->
                <div class="modal fade" id="modal-access-token" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">
                                    Personal Access Token
                                </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>

                            <div class="modal-body">
                                <p>
                                    Here is your new personal access token. This is the only time it will be shown so don't lose it!
                                    You may now use this token to make API requests.
                                </p>

                                <textarea class="form-control" rows="10">@{{ accessToken }}</textarea>
                            </div>

                            <!-- Modal Actions -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </script>
        {{--Define your javascript below--}}
        <script type="text/javascript" src="{{asset('js/axios.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/lodash.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/account/oauth-personal-token.js')}}"></script>
    </div>
@endsection
