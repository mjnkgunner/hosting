<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Đăng nhập</title>
  <base href="{{asset('')}}">

  <!-- Custom fonts for this template-->
  <link href="Login/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="Login/css/sb-admin-2.min.css" rel="stylesheet">
   <link href="Login/css/login.css" rel="stylesheet" type="text/css">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-img"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Chào mừng bạn tới HIBI</h1>
                  </div>
                  <form class="user" action="dangnhap" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Nhập Email của bạn...">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Mật khẩu">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Nhớ mật khẩu</label>
                      </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-user btn-block">Đăng nhập </button>
                    <hr>
                    <a href="trangchu" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Đăng nhập bằng Google
                    </a>
                    <a href="trangchu" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Đăng nhập bằng Facebook
                    </a>

                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="quenmatkhau">Quên mật khẩu?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="dangki">Tạo tài khoản!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="Login/vendor/jquery/jquery.min.js"></script>
  <script src="Login/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="Login/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="Login/js/sb-admin-2.min.js"></script>
  <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v4.0&appId=720557528138471&autoLogAppEvents=1"></script>

</body>

</html>
