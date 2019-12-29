<?php
/**
 * Created by Pizaini <pizaini@uin-suska.ac.id>
 * Date: 17/03/2019
 * Time: 16:27
 */
?>
<div class="topbar-menu">
    <div class="container-fluid">
        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">
                <li class="has-submenu">
                    <a href="{{route('home')}}"><i class="mdi mdi-view-dashboard"></i>Home</a>
                </li>
                @if(App::environment('local'))
                <li class="has-submenu">
                    <a href="#"><i class="mdi mdi-developer-board"></i>Development <div class="arrow-down"></div></a>
                    <ul class="submenu">
                        <li><a href="{{route('development.html')}}" data-toggle="collapse" data-target=".navbar-collapse.show">HTML</a></li>
                        <li><a href="{{route('development.vue-component')}}">Vue component</a></li>
                        <li><a href="#" data-toggle="navigation-menu" data-target=".in">Vue component</a></li>
                    </ul>
                @endif

{{--                        <li class="has-submenu">--}}
{{--                            <a href="#">Tables <div class="arrow-down"></div></a>--}}
{{--                            <ul class="submenu">--}}
{{--                                <li>--}}
{{--                                    <a href="#">Basic Tables</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#">Data Tables</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#">Responsive Table</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#">Editable Table</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#">Tablesaw Table</a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#">Calendar</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#">Mail</a>--}}
{{--                        </li>--}}

{{--                    </ul>--}}
{{--                </li>--}}

{{--                <li class="has-submenu">--}}
{{--                    <a href="#"> <i class="mdi mdi-card-bulleted-settings-outline"></i>Layouts <div class="arrow-down"></div></a>--}}
{{--                    <ul class="submenu">--}}
{{--                        <li>--}}
{{--                            <a href="layouts-menubar-dark.html">Menubar Dark</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="layouts-center-menu.html">Center Menu</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="layouts-menu-drop-dark.html">Menu Drop Dark</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="layouts-preloader.html">Preloader</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="layouts-normal-header.html">Unsticky Header</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="layouts-boxed.html">Boxed</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}

            </ul>
            <!-- End navigation menu -->

            <div class="clearfix"></div>
        </div>
        <!-- end #navigation -->
    </div>
    <!-- end container -->
</div>
<!-- end navbar-custom -->
