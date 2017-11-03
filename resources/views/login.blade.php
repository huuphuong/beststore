
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>@yield('title', 'Đăng nhập')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('images/icon.png') }}">

        <!-- App css -->
        <link href="../plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body class="bg-accpunt-pages">

        <!-- HOME -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="wrapper-page">

                            <div class="account-pages">
                                <div class="account-box">
                                    <div class="account-logo-box">
                                        <h2 class="text-uppercase text-center">
                                            <a href="index.html" class="text-success">
                                                <span><img src="{{ Cache::get('settings')->logo }}" alt="Login Page"></span>
                                            </a>
                                        </h2>

                                        @if (Session::has('flash_message'))
	                                        <p class="m-b-0 text-danger">
	                                        	<span class="glyphicon glyphicon-exclamation-sign"></span>
	                                        	{{ Session::get('flash_message') }}
	                                        </p>
                                        @endif
                                    </div>

                                    <div class="account-content">
                                        <form class="form-horizontal" method="POST" autocomplete="off">
        									<input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                            <div class="form-group m-b-20">
                                                <div class="col-xs-12">
                                                    <label for="emailaddress">E-mail</label>
                                                    <input class="form-control"
                                                    	   type="email"
                                                    	   name="email"
                                                    	   placeholder="VD: admin@gmail.com"
                                                    	   required="required"
                                                    	   tabindex="1"
                                                    	   autofocus="true"
                                                    	   value="{{ Session::has('flash_email') ? Session::get('flash_email') : '' }}"
                                                    />
                                                </div>
                                            </div>

                                            <div class="form-group m-b-20">
                                                <div class="col-xs-12">
                                                    <a href="page-recoverpw.html" class="text-muted pull-right"><small>Quên mật khẩu?</small></a>
                                                    <label for="password">Mật khẩu</label>
                                                    <input class="form-control" type="password" name="password" required="required" tabindex="2">
                                                </div>
                                            </div>

                                            <div class="form-group m-b-20">
                                                <div class="col-xs-12">

                                                    <div class="checkbox checkbox-success">
                                                        <input id="remember" type="checkbox" checked="">
                                                        <label for="remember">
                                                            Lưu đăng nhập
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="form-group text-center m-t-10">
                                                <div class="col-xs-12">
                                                    <button class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">Đăng nhập</button>
                                                </div>
                                            </div>

                                        </form>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="text-center">
                                                    <div class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="continue_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false"></div>
                                                    <button type="button" class="btn m-r-5 btn-googleplus waves-effect waves-light">
                                                        <i class="fa fa-google"></i>
                                                    </button>
                                                    <button type="button" class="btn m-r-5 btn-twitter waves-effect waves-light">
                                                        <i class="fa fa-twitter"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row m-t-50">
                                            <div class="col-sm-12 text-center">
                                                <p class="text-muted">Không có tài khoản? <a href="page-register.html" class="text-dark m-l-5"><b>Đăng ký</b></a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card-box-->


                        </div>
                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
          </section>
          <!-- END HOME -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="../plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>