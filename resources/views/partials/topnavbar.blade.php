<?php
use \Illuminate\Support\Facades\Auth;
/**
 * Created by Pizaini <pizaini@uin-suska.ac.id>
 * Date: 19/12/2019
 * Time: 21:12
 */
?>
<!-- Topbar Start -->
<div class="navbar-custom">
    <div class="container-fluid">
        <ul class="list-unstyled topnav-menu float-right mb-0">
            <li class="dropdown notification-list">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle nav-link">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </li>
            @if(Auth::guest())
                <li class="dropdown notification-list">
                    <a class="nav-link waves-effect" href="{{route('auth.login')}}"><i class="fe-log-in"></i> Login</a>
                </li>
            @endif
            @if(Auth::check())
                <li class="d-none d-sm-block">
                    <form class="app-search">
                        <div class="app-search-box">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search...">
                                <div class="input-group-append">
                                    <button class="btn" type="submit">
                                        <i class="fe-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </li>

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="fe-bell noti-icon"></i>
                        <span class="badge badge-danger rounded-circle noti-icon-badge">1</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-lg">
                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="m-0">
                                        <span class="float-right">
                                            <a href="" class="text-dark">
                                                <small>Clear All</small>
                                            </a>
                                        </span>Notification
                            </h5>
                        </div>
                        <div class="slimscroll noti-scroll">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                <div class="notify-icon">
                                    <img src="{{asset('images/logo.png')}}" class="img-fluid rounded-circle" alt="" /> </div>
                                <p class="notify-details">Info</p>
                                <p class="text-muted mb-0 user-msg">
                                    <small>Info</small>
                                </p>
                            </a>
                        </div>

                        <!-- All-->
                        <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                            View all
                            <i class="fi-arrow-right"></i>
                        </a>
                    </div>
                </li>

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{Auth::user()->getPhotoProfil()}}" alt="user-image" class="rounded-circle">
                        <span class="pro-user-name ml-1">{{Auth::user()->name}} <i class="mdi mdi-chevron-down"></i></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Assalamu'alaikum</h6>
                        </div>
                        <a href="{{route('account.profil.show')}}" class="dropdown-item notify-item">
                            <i class="fe-user"></i>
                            <span>Profil</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <!-- item-->
                        <a href="{{route('auth.logout')}}" class="dropdown-item notify-item">
                            <i class="fe-log-out"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </li>
            @endif

        </ul>
        <!-- LOGO -->
        <div class="logo-box">
            <a href="{{route('home')}}" class="logo text-center">
                <span class="logo-lg">
                    <img src="{{asset('images/logo-inverse.png')}}" alt="" height="32">
                {{--  <span class="logo-lg-text-light">OPAC</span>--}}
                </span>
                <span class="logo-sm">
                    <!-- <span class="logo-sm-text-dark">U</span> -->
                    <img src="{{asset('images/logo-black.png')}}" alt="" height="24">
                </span>
            </a>
        </div>
    </div> <!-- end container-fluid-->
</div>
<!-- end Topbar -->
