<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
  <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
  <meta name="author" content="PIXINVENT">
  <title>Đăng Nhập</title>
  <link rel="apple-touch-icon" href="{{ asset('assets') }}/app-assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets') }}/app-assets/images/ico/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/app-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/app-assets/vendors/css/forms/icheck/icheck.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/app-assets/vendors/css/forms/icheck/custom.css">
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/app-assets/css/app.css">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/app-assets/css/pages/login-register.css">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/assets/css/style.css">
  <!-- END Custom CSS-->
  
  <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/app-assets/css/core/colors/palette-callout.css"> 
</head>
<body class="vertical-layout vertical-menu-modern 1-column  bg-cyan bg-lighten-2 menu-expanded blank-page blank-page"
data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 m-0">
                <div class="card-header border-0">
                  <div class="card-title text-center">
                    <div class="p-1">
                      <img src="https://dewey.tailorbrands.com/production/brand_version_mockup_image/251/1054374251_18817353-6b15-45f3-86d1-4e03f5eea377.png" alt="branding logo">
                    </div>
                  </div>
                  
                </div>
				
				@if ( request()->get('action') === "kiem-tien" )
                    <div class="card">
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <div class="bs-callout-success callout-border-left mt-1 p-1">
                                    <strong>Thông báo !</strong>
									<p>Bạn cần đăng nhập trước để kiếm tiền với chúng tôi !</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif 
				
				@if (!$errors->isEmpty())
                    <div class="card">
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <div class="bs-callout-danger callout-border-left mt-1 p-1">
                                    <strong>Có lỗi xảy ra !</strong>
									@foreach($errors->all() as $message)
                                    <p>{{ $message }}</p>
									@endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif 
			
                <div class="card-content">
                  <div class="card-body pt-0">
                    <form method="post" class="form-horizontal" action="{{ url('login') }}" >
						@csrf
					
                      <fieldset class="form-group floating-label-form-group">
                        <label for="user-name">Email</label>
                        <input type="text" name="email" class="form-control" id="user-name" placeholder="Email" value="{{ old('email') }}" required>
                      </fieldset>
                      <fieldset class="form-group floating-label-form-group mb-1">
                        <label for="user-password">Mật Khẩu</label>
                        <input type="password" name="password" class="form-control" id="user-password" placeholder="Mật Khẩu"  value="{{ old('password') }}" required>
                      </fieldset>
                      <div class="form-group row">
                        <div class="col-md-6 col-12 text-center text-sm-left">
                          <fieldset>
                            <input type="checkbox" id="remember-me" class="chk-remember">
                            <label for="remember-me"> Remember Me</label>
                          </fieldset>
                        </div>
                        <div class="col-md-6 col-12 float-sm-left text-center text-sm-right"><a href="#" class="card-link">Forgot Password?</a></div>
                      </div>
                      <button type="submit" class="btn btn-outline-info btn-block"><i class="ft-unlock"></i> Login</button>
                    </form>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <!-- BEGIN VENDOR JS-->
  <script src="{{ asset('assets') }}/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="{{ asset('assets') }}/app-assets/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="{{ asset('assets') }}/app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="{{ asset('assets') }}/app-assets/js/core/app.js" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="{{ asset('assets') }}/app-assets/js/scripts/forms/form-login-register.js" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
</body>
</html>