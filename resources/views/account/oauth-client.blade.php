<?php
use App\Libs\AppHelpers;
$title = 'OAuth Clients';
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
                            <vc-account-oauth-client></vc-account-oauth-client>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <vc-account-authorized-client></vc-account-authorized-client>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--Templates--}}
        <script type="text/x-template" id="vc-account-oauth-client">
            <div>
                <div class="card-box">
                    <div class="float-right">
                        <button type="button" class="btn btn-purple btn-rounded width-md waves-effect waves-light" @click="showCreateClientForm">Create New Client</button>
                    </div>
                    <h4 class="header-title mt-0">OAuth Application Clients</h4>
                    <p class="text-muted font-13">App Client yang dapat mengakses data Anda di pada sistem ini</p>
                    <!-- Current Clients -->
                    <p class="mb-0" v-if="clients.length === 0">
                        You have not created any OAuth clients.
                    </p>
                    <table class="table mb-0" v-if="clients.length > 0">
                        <thead class="thead-light">
                        <tr>
                            <th>Client ID</th>
                            <th>Client Name</th>
                            <th>Secret</th>
                            <th>Callback URL</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr v-for="client in clients">
                            <td>
                                @{{ client.id }}
                            </td>
                            <td>
                                @{{ client.name }}
                                <p class="text-muted font-13 mt-1">@{{ client.created_at }}</p>
                            </td>
                            <td>
                                <code>@{{ client.secret }}</code>
                            </td>
                            <td>
                                @{{ client.redirect }}
                            </td>
                            <td>
                                 <ul class="nav nav-pills">
                                     <li class="mr-1 mb-1">
                                         <a href="javascript:void(0);" @click="edit(client)">
                                             <span class="badge badge-success badge-pill float-left">Edit <i class="ti-pencil"></i> </span>
                                         </a>
                                     </li>
                                     <li>
                                         <a href="javascript:void(0);" @click="destroy(client)">
                                             <span class="badge badge-danger badge-pill float-left">Revoke <i class="mdi mdi-block-helper"></i> </span>
                                         </a>
                                     </li>
                                 </ul>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Create Client Modal -->
                <div class="modal fade" id="modal-create-client" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">
                                    Create Client
                                </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>

                            <div class="modal-body">
                                <!-- Form Errors -->
                                <div class="alert alert-danger" v-if="createForm.errors.length > 0">
                                    <p class="mb-0"><strong>Whoops!</strong> Something went wrong!</p>
                                    <br>
                                    <ul>
                                        <li v-for="error in createForm.errors">
                                            @{{ error }}
                                        </li>
                                    </ul>
                                </div>

                                <!-- Create Client Form -->
                                <form role="form">
                                    <!-- Name -->
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Name</label>

                                        <div class="col-md-9">
                                            <input id="create-client-name" type="text" class="form-control" @keyup.enter="store" v-model="createForm.name">

                                            <span class="form-text text-muted">
                                        Something your users will recognize and trust.
                                    </span>
                                        </div>
                                    </div>

                                    <!-- Redirect URL -->
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Redirect URL</label>

                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="redirect"
                                                   @keyup.enter="store" v-model="createForm.redirect">
                                            <span class="form-text text-muted">
                                        Your application's authorization callback URL.
                                    </span>
                                        </div>
                                    </div>

                                    <!-- Confidential -->
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Confidential</label>
                                        <div class="col-md-9">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="checkBoxConfidential" v-model="createForm.confidential">
                                                <label class="custom-control-label" for="checkBoxConfidential">Check if confidential</label>
                                            </div>
                                            <span class="form-text text-muted">
                                        Require the client to authenticate with a secret. Confidential clients can hold credentials in a secure way without exposing them to unauthorized parties. Public applications, such as native desktop or JavaScript SPA applications, are unable to hold secrets securely.
                                    </span>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- Modal Actions -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" @click="store">Create</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Client Modal -->
                <div class="modal fade" id="modal-edit-client" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">
                                    Edit Client
                                </h4>

                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>

                            <div class="modal-body">
                                <!-- Form Errors -->
                                <div class="alert alert-danger" v-if="editForm.errors.length > 0">
                                    <p class="mb-0"><strong>Whoops!</strong> Something went wrong!</p>
                                    <br>
                                    <ul>
                                        <li v-for="error in editForm.errors">
                                           @{{ error }}
                                        </li>
                                    </ul>
                                </div>

                                <!-- Edit Client Form -->
                                <form role="form">
                                    <!-- Name -->
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Name</label>

                                        <div class="col-md-9">
                                            <input id="edit-client-name" type="text" class="form-control"
                                                   @keyup.enter="update" v-model="editForm.name">

                                            <span class="form-text text-muted">
                                        Something your users will recognize and trust.
                                    </span>
                                        </div>
                                    </div>

                                    <!-- Redirect URL -->
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Redirect URL</label>

                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="redirect"
                                                   @keyup.enter="update" v-model="editForm.redirect">

                                            <span class="form-text text-muted">
                                        Your application's authorization callback URL.
                                    </span>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- Modal Actions -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                <button type="button" class="btn btn-primary" @click="update">
                                    Save Changes
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </script>
        <script type="text/x-template" id="vc-account-authorized-client">
            <div>
                <div class="card-box">
                    <h4 class="header-title mt-0">Authorized Applications</h4>
                    <p class="text-muted font-13">App Client yang telah diizinkan mengakses data Anda di pada sistem ini</p>
                    <!-- Current Clients -->
                    <p class="mb-0" v-if="tokens.length === 0">No authorized applications</p>
                    <!-- Authorized Tokens -->
                    <table class="table mb-0" v-if="tokens.length > 0">
                        <thead class="thead-light">
                        <tr>
                            <th>Name</th>
                            <th>Scopes</th>
                            <th>Created</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="token in tokens">
                            <td>
                                @{{ token.client.name }}
                            </td>
                            <td>
                                    <span v-if="token.scopes.length > 0">
                                        @{{ token.scopes.join(', ') }}
                                    </span>
                            </td>
                            <td>
                                @{{ token.created_at }}
                            </td>
                            <td>
                                <a href="javascript:void(0);" @click="revoke(token)">
                                    <span class="badge badge-danger badge-pill float-left">Revoke <i class="mdi mdi-block-helper"></i> </span>
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </script>
        {{--Define your javascript below--}}
        <script type="text/javascript" src="{{asset('js/axios.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/lodash.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/account/oauth-client.js')}}"></script>
    </div>
@endsection
