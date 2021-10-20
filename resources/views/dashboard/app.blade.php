<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="ar" dir="rtl">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>A+ Platform</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Preview page of Metronic Admin RTL Theme #1 for blank page layout" name="description" />
    <meta content="" name="author" />
    <link rel="icon" href="{{asset('front/img/LogosSite/LogoWhite.svg')}}">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org//face/droid-arabic-kufi" type="text/css"/>
    {{--    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />--}}
    <link href="{{asset('dashboard/assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('dashboard/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('dashboard/assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('dashboard/assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{asset('dashboard/assets/global/css/components-rounded-rtl.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{asset('dashboard/assets/global/css/plugins-rtl.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('dashboard/assets/global/css/components-rounded-rtl.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{asset('dashboard/assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('dashboard/assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{asset('dashboard/assets/layouts/layout/css/layout-rtl.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('dashboard/assets/layouts/layout/css/themes/default-rtl.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{asset('dashboard/assets/layouts/layout/css/custom-rtl.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico" />

    <style>
        body,h1,h2,h3,h4,h5,.dropdown-menu{
            font-family: 'DroidArabicKufiRegular' !important;
            font-weight: normal;
            font-style: normal;
        }
    </style>

    @yield('page-style')
</head>
<!-- END HEAD -->

<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white">
<div class="page-wrapper">
    <!-- BEGIN HEADER -->
    <div class="page-header navbar navbar-fixed-top">
        <!-- BEGIN HEADER INNER -->
        <div class="page-header-inner ">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <a href="#">
                    <img src="{{asset('dashboard/assets/layouts/layout/img/logo.png')}}" alt="logo" class="logo-default" /> </a>
                <div class="menu-toggler sidebar-toggler">
                    <span></span>
                </div>
            </div>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                <span></span>
            </a>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            @if(\Illuminate\Support\Facades\Auth::guard('admin')->check())
                                <img alt="" class="img-circle" src="{{asset('dashboard/assets/layouts/layout/img/avatar.png')}}" />
                                <span class="username username-hide-on-mobile"> {{auth('admin')->user()->name}} </span>
                            @elseif(auth('teacher')->check())
                                <img alt="" class="img-circle" src="{{asset('storage/teacher_images/'.auth('teacher')->user()->image)}}" />
                                <span class="username username-hide-on-mobile"> {{auth('teacher')->user()->name}} </span>
                            @endif
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            @if(auth('admin')->check())
                                <li>
                                    <a href="{{route('auth.admin_logout')}}">
                                        <i class="icon-key"></i>تسجيل خروج</a>
                                </li>
                            @endif
                            @if(auth('teacher')->check())
                                    <li>
                                        <a href="{{route('auth.teacher_logout')}}">
                                            <i class="icon-key"></i>تسجيل خروج</a>
                                    </li>
                            @endif
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                    <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
{{--                    <li class="dropdown dropdown-quick-sidebar-toggler">--}}
{{--                        <a href="{{route('auth.admin_logout')}}" class="dropdown-toggle">--}}
{{--                            <i class="icon-logout"></i>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                    <!-- END QUICK SIDEBAR TOGGLER -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END HEADER INNER -->
    </div>
    <!-- END HEADER -->
    <!-- BEGIN HEADER & CONTENT DIVIDER -->
    <div class="clearfix"> </div>
    <!-- END HEADER & CONTENT DIVIDER -->
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <!-- BEGIN SIDEBAR -->
        <div class="page-sidebar-wrapper">
            <!-- BEGIN SIDEBAR -->
            <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
            <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
            <div class="page-sidebar navbar-collapse collapse">
                <!-- BEGIN SIDEBAR MENU -->
                <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                    <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                    <li class="sidebar-toggler-wrapper hide">
                        <div class="sidebar-toggler">
                            <span></span>
                        </div>
                    </li>
                    <!-- END SIDEBAR TOGGLER BUTTON -->
                    <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                    <li class="sidebar-search-wrapper">
                        <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                        <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                        <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                        <form class="sidebar-search  sidebar-search-bordered" action="page_general_search_3.html" method="POST">
                            <a href="javascript:;" class="remove">
                                <i class="icon-close"></i>
                            </a>
{{--                            <div class="input-group">--}}
{{--                                <input type="text" class="form-control" placeholder="Search...">--}}
{{--                                <span class="input-group-btn">--}}
{{--                                            <a href="javascript:;" class="btn submit">--}}
{{--                                                <i class="icon-magnifier"></i>--}}
{{--                                            </a>--}}
{{--                                        </span>--}}
{{--                            </div>--}}
                        </form>
                        <!-- END RESPONSIVE QUICK SEARCH FORM -->
                    </li>
                    @if(auth('admin')->check())
                    <li class="nav-item start @if(request()->routeIs('dashboard.main')) active @endif">
                        <a href="{{route('dashboard.main')}}" class="nav-link">
                            <i class="icon-home"></i>
                            <span class="title">الرئيسية</span>
                        </a>
                    </li>
                    <li class="heading">
                        <h3 class="uppercase">الاقسام</h3>
                    </li>
                    <li class="nav-item start @if(request()->routeIs('dashboard.users.index')) active @endif">
                        <a href="{{route('dashboard.users.index')}}" class="nav-link">
                            <i class="icon-graduation"></i>
                            <span class="title">الطلاب</span>
                        </a>
                    </li>

                    <li class="nav-item start @if(request()->routeIs('dashboard.orders.index')) active @endif">
                        <a href="{{route('dashboard.orders.index')}}" class="nav-link">
                            <i class="icon-graduation"></i>
                            <span class="title">عمليات الدفع</span>
                        </a>
                    </li>

                    <li class="nav-item start @if(request()->routeIs('dashboard.sections.index')) active @endif">
                        <a href="{{route('dashboard.sections.index')}}" class="nav-link">
                            <i class="icon-bulb"></i>
                            <span class="title">التخصصات</span>
                        </a>
                    </li>
                    <li class="nav-item start @if(request()->routeIs('dashboard.teachers.index')) active @endif">
                        <a href="{{route('dashboard.teachers.index')}}" class="nav-link">
                            <i class="icon-users"></i>
                            <span class="title">المدرسين</span>
                        </a>
                    </li>
                    <li class="nav-item start @if(request()->routeIs('dashboard.admins.index')) active @endif">
                        <a href="{{route('dashboard.admins.index')}}" class="nav-link">
                            <i class="icon-user-follow"></i>
                            <span class="title">المشرفين</span>
                        </a>
                    </li>
                    <li class="nav-item start @if(request()->routeIs('dashboard.courses.index')) active @endif">
                        <a href="{{route('dashboard.courses.index')}}" class="nav-link">
                            <i class="icon-paper-clip"></i>
                            <span class="title">المواد</span>
                        </a>
                    </li>
                    <li class="nav-item start @if(request()->routeIs('dashboard.topics.index')) active @endif">
                        <a href="{{route('dashboard.topics.index')}}" class="nav-link">
                            <i class="icon-list"></i>
                            <span class="title">الوحدات</span>
                        </a>
                    </li>
                    <li class="nav-item start @if(request()->routeIs('dashboard.lessons.index')) active @endif">
                        <a href="{{route('dashboard.lessons.index')}}" class="nav-link">
                            <i class="icon-screen-desktop"></i>
                            <span class="title">الدروس</span>
                        </a>
                    </li>
                    <li class="heading">
                        <h3 class="uppercase">اضافي</h3>
                    </li>
                    <li class="nav-item start @if(request()->routeIs('dashboard.trash.index')) active @endif">
                        <a href="{{route('dashboard.trash.index')}}" class="nav-link">
                            <i class="icon-trash"></i>
                            <span class="title">سلة المحذوفات</span>
                        </a>
                    </li>
                    @endif
                    @if(auth('teacher')->check())
                        <li class="nav-item start @if(request()->routeIs('dashboard.teachers.main')) active @endif">
                            <a href="{{route('dashboard.teachers.main')}}" class="nav-link">
                                <i class="icon-home"></i>
                                <span class="title">الرئيسية</span>
                            </a>
                        </li>
                        <li class="heading">
                            <h3 class="uppercase">المواد</h3>
                        </li>
                        @foreach(auth('teacher')->user()->courses as $course)
                            <li class="nav-item start @if(request()->fullUrlIs(\Illuminate\Support\Facades\URL::to('/').'/dashboard/teachers/course/'.$course->id)) active @endif">
                                <a href="{{route('dashboard.teachers.course',$course->id)}}" class="nav-link">
                                    <i class="icon-paper-clip"></i>
                                    <span class="title">{{$course->name}}</span>
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>
                <!-- END SIDEBAR MENU -->
                <!-- END SIDEBAR MENU -->
            </div>
            <!-- END SIDEBAR -->
        </div>
        <!-- END SIDEBAR -->
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <div class="page-content">
                @yield('content')
                @include('sweetalert::alert')
            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <div class="page-footer">
        <div class="page-footer-inner" style="float: left;"> 2021 &copy; Control Panel By
            <a target="_blank" href="https://www.freelancer.com/u/ahmadfaroukh">Ahmad Faroukh</a>
        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>
    <!-- END FOOTER -->
</div>
<div class="quick-nav-overlay"></div>
<!-- END QUICK NAV -->
<!--[if lt IE 9]>
<script src="{{asset('dashboard/assets/global/plugins/respond.min.js')}}"></script>
<script src="{{asset('dashboard/assets/global/plugins/excanvas.min.js')}}"></script>
<script src="{{asset('dashboard/assets/global/plugins/ie8.fix.min.js')}}"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{{asset('dashboard/assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard/assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard/assets/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard/assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{asset('dashboard/assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard/assets/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard/assets/pages/scripts/components-select2.min.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard/assets/global/plugins/counterup/jquery.waypoints.min.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard/assets/global/plugins/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{asset('dashboard/assets/layouts/layout/scripts/layout.min.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard/assets/layouts/layout/scripts/demo.min.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard/assets/layouts/global/scripts/quick-sidebar.min.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard/assets/layouts/global/scripts/quick-nav.min.js')}}" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
@yield('page-js')
</body>

</html>
