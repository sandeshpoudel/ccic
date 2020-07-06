<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>CCI Staff Login</title>

    <meta name="description" content="User login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href={{ asset('assets/css/bootstrap.css') }} />
    <link rel="stylesheet" href={{ asset('components/font-awesome/css/font-awesome.css') }} />

    <!-- text fonts -->
    <link rel="stylesheet" href={{ asset('assets/css/ace-fonts.css') }} />

    <!-- ace styles -->
    <link rel="stylesheet" href={{ asset('assets/css/ace.css') }} />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href={{ asset('assets/css/ace-part2.css') }} />
    <![endif]-->
    <link rel="stylesheet" href={{ asset('assets/css/ace-rtl.css') }} />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href={{ asset('assets/css/ace-ie.css') }} />
    <![endif]-->

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="{{ asset('components/html5shiv/dist/html5shiv.min.js')}}"></script>
    <script src="{{ asset('components/respond/dest/respond.min.js')}}"></script>
    <![endif]-->
</head>

<body class="login-layout">
<div class="main-container">
    <div class="main-content">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="login-container">
                    <div class="center">
                        <h1>
                            <h1>
                                <i class="ace-icon fa fa-users green"></i>
                                <span class="red">Chamber Of Commerce &amp; Industry Chitwan</span>
                                <span class="white" id="id-text2">Staff's Login</span>
                            </h1>
                        </h1>

                    </div>

                    <div class="space-6"></div>

                    <div class="position-relative">
                        <div id="login-box" class="login-box visible widget-box no-border">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <h4 class="header blue lighter bigger">
                                        <i class="ace-icon fa fa-key green"></i>
                                        Please Enter Your Information
                                    </h4>

                                    <div class="space-6"></div>

                                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                                        {{ csrf_field() }}

                                        <fieldset>
                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" />
															<i class="ace-icon fa fa-user"></i>
														</span>
                                            </label>

                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" name="password" id="password" class="form-control" placeholder="Password" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
                                            </label>

                                            <div class="space"></div>

                                            <div class="clearfix">
                                                <label class="inline">

                                                    <input type="checkbox" class="ace" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    <span class="lbl"> Remember Me</span>
                                                </label>


                                                <button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
                                                    <i class="ace-icon fa fa-key"></i>
                                                    <span class="bigger-110">Sign in</span>
                                                </button>


                                            </div>

                                            <div class="space-4"></div>
                                        </fieldset>
                                    </form>
                                </div><!-- /.widget-main -->


                            </div><!-- /.widget-body -->
                        </div><!-- /.login-box -->



                        <!-- /.signup-box -->
                    </div><!-- /.position-relative -->


                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.main-content -->
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
<script src={{ asset('components/jquery/dist/jquery.js') }}></script>

<!-- <![endif]-->

<!--[if IE]>
<script src={{ asset('components/jquery.1x/dist/jquery.js') }}></script>
<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='../components/_mod/jquery.mobile.custom/jquery.mobile.custom.js'>"+"<"+"/script>");
</script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
    jQuery(function($) {
        $(document).on('click', '.toolbar a[data-target]', function(e) {
            e.preventDefault();
            var target = $(this).data('target');
            $('.widget-box.visible').removeClass('visible');//hide others
            $(target).addClass('visible');//show target
        });
    });



    //you don't need this, just used for changing background
    jQuery(function($) {
        $('#btn-login-dark').on('click', function(e) {
            $('body').attr('class', 'login-layout');
            $('#id-text2').attr('class', 'white');
            $('#id-company-text').attr('class', 'blue');

            e.preventDefault();
        });
        $('#btn-login-light').on('click', function(e) {
            $('body').attr('class', 'login-layout light-login');
            $('#id-text2').attr('class', 'grey');
            $('#id-company-text').attr('class', 'blue');

            e.preventDefault();
        });
        $('#btn-login-blur').on('click', function(e) {
            $('body').attr('class', 'login-layout blur-login');
            $('#id-text2').attr('class', 'white');
            $('#id-company-text').attr('class', 'light-blue');

            e.preventDefault();
        });

    });
</script>
</body>
</html>
