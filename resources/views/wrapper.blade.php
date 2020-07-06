<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>CCI Management - @yield('title')</title>

    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('components/font-awesome/css/font-awesome.css') }}" />


    <!-- page specific plugin styles -->
@yield('headerscripts')
    <style>

        @keyframes heartbeat
        {
            0%
            {
                transform: scale( .75 );
            }
            20%
            {
                transform: scale( 1 );
            }
            40%
            {
                transform: scale( .75 );
            }
            60%
            {
                transform: scale( 1 );
            }
            80%
            {
                transform: scale( .75 );
            }
            100%
            {
                transform: scale( .75 );
            }
        }

        .duhukdhuk
        {
            width: 25px;
            height: 25px;
            animation: heartbeat 1s infinite;
        }

    </style>

   <!-- text fonts -->
    <link rel="stylesheet" href="{{ asset('assets/css/ace-fonts.css') }}" />


    <!-- ace styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/ace.css') }}" class="ace-main-stylesheet" id="main-ace-style" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="{{ asset('assets/css/ace-part2.css') }}" class="ace-main-stylesheet" />
    <![endif]-->
    <link rel="stylesheet" href="{{ asset('assets/css/ace-skins.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/ace-rtl.css') }}" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="{{ asset('assets/css/ace-ie.css') }}" />

    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- google unicode -->
    {{--<script type="text/javascript" src="https://www.google.com/jsapi"></script>--}}
    <script type="text/javascript" src="{{ asset('js/transliteration.I.js') }}"></script>
    <script type="text/javascript">

        // Load the Google Transliterate API
        google.load("elements", "1", {
            packages: "transliteration"
        });

        function onLoad() {
            var options = {
                sourceLanguage: 'en',

                destinationLanguage: ['hi'],
                shortcutKey: 'ctrl+m',
                transliterationEnabled: true
            };

            // Create an instance on TransliterationControl with the required
            // options.
            var control =
                new google.elements.transliteration.TransliterationControl(options);

            // Enable transliteration in the textbox with id
            // 'transliterateTextarea'.
            control.makeTransliteratable(['transliterateTextarea']);
            control.makeTransliteratable(['transliterateProName']);
            control.makeTransliteratable(['transliterateAddress']);
        }
        google.setOnLoadCallback(onLoad);
    </script>
    <script src="{{ asset('assets/js/ace-extra.js')}}"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="{{ asset('components/html5shiv/dist/html5shiv.min.js')}}"></script>
    <script src="{{ asset('components/respond/dest/respond.min.js')}}"></script>
    <![endif]-->
</head>

<body class="no-skin">
<!-- #section:basics/navbar.layout -->
<div id="navbar" class="navbar navbar-default          ace-save-state">
    <div class="navbar-container ace-save-state" id="navbar-container">
        <!-- #section:basics/sidebar.mobile.toggle -->
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>
        </button>

        <!-- /section:basics/sidebar.mobile.toggle -->
        <div class="navbar-header pull-left">
            <!-- #section:basics/navbar.layout.brand -->

            <a href="/staff/dashboard" class="navbar-brand">
                <small>
                    <i class="fa fa-users"></i>
                    CCI Membership Management
                </small>
            </a>



            <!-- /section:basics/navbar.layout.brand -->

            <!-- #section:basics/navbar.toggle -->

            <!-- /section:basics/navbar.toggle -->
        </div>

        <!-- #section:basics/navbar.dropdown -->
        <div class="navbar-buttons navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">


                <li class="purple dropdown-modal">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="ace-icon fa fa-bell icon-animated-bell"></i>
                        <span class="badge badge-important">8</span>
                    </a>

                    <ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
                        <li class="dropdown-header">
                            <i class="ace-icon fa fa-exclamation-triangle"></i>
                            8 Notifications
                        </li>

                        <li class="dropdown-content">
                            <ul class="dropdown-menu dropdown-navbar navbar-pink">
                                <li>
                                    <a href="#">
                                        <div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
														New Comments
													</span>
                                            <span class="pull-right badge badge-info">+12</span>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="btn btn-xs btn-primary fa fa-user"></i>
                                        Bob just signed up as an editor ...
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-success fa fa-shopping-cart"></i>
														New Orders
													</span>
                                            <span class="pull-right badge badge-success">+8</span>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-info fa fa-twitter"></i>
														Followers
													</span>
                                            <span class="pull-right badge badge-info">+11</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown-footer">
                            <a href="#">
                                See all notifications
                                <i class="ace-icon fa fa-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>



                <!-- #section:basics/navbar.user_menu -->
                <li class="light-blue dropdown-modal">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo" src="{{ asset('assets/avatars/user.jpg')}}" alt="Jason's Photo" />
                        <span class="user-info">
									<small>Welcome,</small>
                            {{ Auth::user()->name }}
								</span>

                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>

                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <li>
                            <a href="#">
                                <i class="ace-icon fa fa-cog"></i>
                                Settings
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="ace-icon fa fa-user"></i>
                                Profile
                            </a>
                        </li>

                        <li class="divider"></li>

                        <li>
                            {!! Form::open(['url' => '/logout']) !!}
                            <button type="submit" class="btn btn-danger btn-block">
                                <i class="ace-icon fa fa-power-off"></i>
                                Logout
                            </button>
                            {!! Form::close() !!}

                        </li>
                    </ul>
                </li>

                <!-- /section:basics/navbar.user_menu -->
            </ul>
        </div>

        <!-- /section:basics/navbar.dropdown -->
    </div>

    <!-- /.navbar-container -->
</div>

<!-- /section:basics/navbar.layout -->
<div class="main-container ace-save-state" id="main-container">
    <script type="text/javascript">
        try{ace.settings.loadState('main-container')}catch(e){}
    </script>

    <!-- #section:basics/sidebar -->
    <div id="sidebar" class="sidebar                  responsive                    ace-save-state">
        <script type="text/javascript">
            try{ace.settings.loadState('sidebar')}catch(e){}
        </script>
    {{--Navigation Side bar starts from here--}}
    {{--@include('parts.sidenav')--}}
        {{ menu('staff', 'parts.sidenav') }}
    <!-- /.nav-list -->
    {{--Navigation Bar Ends Here--}}

    <!-- #section:basics/sidebar.layout.minimize -->
        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
            <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>

        <!-- /section:basics/sidebar.layout.minimize -->
    </div>

    <!-- /section:basics/sidebar -->
    <div class="main-content">
        <div class="main-content-inner">
            <!-- #section:basics/content.breadcrumbs -->
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <!-- #section:basics/content.searchbox -->
                <div class="breadcrumb">

                </div>
                <div class="nav-search" id="nav-search">
                   <b>{{ \Carbon\Carbon::now()->format('l jS \\of F Y A') }}</b>
                    {{--@include('parts.search')--}}
                </div><!-- /.nav-search -->

                <!-- /section:basics/content.searchbox -->
            </div>

            <!-- /section:basics/content.breadcrumbs -->
            <div class="page-content">
                <!-- #section:settings.box -->
                <div class="page-header">
                    <h1>
                        @yield('title')
                    </h1>
                </div><!-- /.page-header -->

                <!-- /section:settings.box -->
                <div class="row">
                    <div class="col-xs-12">

                    @include('flash::message')
                        <!-- PAGE CONTENT BEGINS -->
                    @yield('content')
                    <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->

    <div class="footer">
        <div class="footer-inner">
            <!-- #section:basics/footer -->
            <div class="footer-content">
						<span class="bigger-120">
							Made with
                            <svg class="duhukdhuk" width="21" height="17" viewBox="0 0 21 17" xmlns="http://www.w3.org/2000/svg">
                                <title>love</title>
                                <path d="M14.725.032a5.31 5.31 0 0 0-4.687 2.814 5.312 5.312 0 0 0-10 2.498c0 4.763 5.834 7.397 10 11.564 4.306-4.306 10-6.76 10-11.563A5.312 5.312 0 0 0 14.725.032z" fill="#E82F2F" fill-rule="evenodd"></path>
                            </svg> by ioMelody - v1.5.41
						</span>

                &nbsp; &nbsp;
            </div>

            <!-- /section:basics/footer -->
        </div>
    </div>

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
<script src="{{ asset('components/jquery/dist/jquery.js')}}"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="{{ asset('components/jquery.1x/dist/jquery.js')}}"></script>
<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src={{ asset('components/_mod/jquery.mobile.custom/jquery.mobile.custom.js')}}>"+"<"+"/script>");
</script>
<script src="{{ asset('components/bootstrap/dist/js/bootstrap.js')}}"></script>


<!-- ace scripts -->
<script src="{{ asset('components/_mod/jquery-ui.custom/jquery-ui.custom.js') }}"></script>
<script src="{{ asset('components/jqueryui-touch-punch/jquery.ui.touch-punch.js') }}"></script>
<script src="{{ asset('assets/js/src/elements.scroller.js')}}"></script>
<script src="{{ asset('assets/js/src/elements.colorpicker.js')}}"></script>
<script src="{{ asset('assets/js/src/elements.fileinput.js')}}"></script>
<script src="{{ asset('assets/js/src/elements.typeahead.js')}}"></script>
<script src="{{ asset('assets/js/src/elements.wysiwyg.js')}}"></script>
<script src="{{ asset('assets/js/src/elements.spinner.js')}}"></script>
<script src="{{ asset('assets/js/src/elements.treeview.js')}}"></script>
<script src="{{ asset('assets/js/src/elements.wizard.js')}}"></script>
<script src="{{ asset('assets/js/src/elements.aside.js')}}"></script>
<script src="{{ asset('assets/js/src/ace.js')}}"></script>
<script src="{{ asset('assets/js/src/ace.basics.js')}}"></script>
<script src="{{ asset('assets/js/src/ace.scrolltop.js')}}"></script>
<script src="{{ asset('assets/js/src/ace.ajax-content.js')}}"></script>
<script src="{{ asset('assets/js/src/ace.touch-drag.js')}}"></script>
<script src="{{ asset('assets/js/src/ace.sidebar.js')}}"></script>
<script src="{{ asset('assets/js/src/ace.sidebar-scroll-1.js')}}"></script>
<script src="{{ asset('assets/js/src/ace.submenu-hover.js')}}"></script>
<script src="{{ asset('assets/js/src/ace.widget-box.js')}}"></script>
<script src="{{ asset('assets/js/src/ace.settings.js')}}"></script>
<script src="{{ asset('assets/js/src/ace.settings-rtl.js')}}"></script>
<script src="{{ asset('assets/js/src/ace.settings-skin.js')}}"></script>
<script src="{{ asset('assets/js/src/ace.widget-on-reload.js')}}"></script>
<script src="{{ asset('assets/js/src/ace.searchbox-autocomplete.js')}}"></script>

<!-- inline scripts related to this page -->

<!-- page specific plugin scripts -->
@yield('footerscripts')
<script type="text/javascript">
    jQuery(function($) {
        $('#gritter-center').on(ace.click_event, function(){
            $.gritter.add({
                title: 'This is a centered notification',
                text: 'Just add a "gritter-center" class_name to your $.gritter.add or globally to $.gritter.options.class_name',
                class_name: 'gritter-info gritter-center' + (!$('#gritter-light').get(0).checked ? ' gritter-light' : '')
            });

            return false;
        });

    });





</script>


</body>
</html>
