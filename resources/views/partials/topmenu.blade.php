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

                @if(Auth::check())
                    <li class="has-submenu">
                        <a href="{{route('home')}}"><i class="mdi mdi-view-dashboard"></i>Menu 1</a>
                    </li>
                @endif
            </ul>   
            <!-- End navigation menu -->
            <div class="clearfix"></div>
        </div>
        <!-- end #navigation -->
    </div>
    <!-- end container -->
</div>
<!-- end navbar-custom -->
