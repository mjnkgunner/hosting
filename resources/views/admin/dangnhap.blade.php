<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - Đăng nhập</title>
  <base href="{{asset('')}}">

  <!-- Custom fonts for this template-->
  <link href="Loginadmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="Loginadmin/css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Đăng nhập vào trang quản trị HIBI</div>
      <div class="card-body">
        @if(Session::has('danger'))
        <div class="alert alert-danger">{{Session::get('danger')}}</div>
        @endif
        @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                            {{$err}} <br>
                            @endforeach
                        </div>
                        @endif
        <form action="admin/dangnhap" method="post" >
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Địa chỉ email" required="required" autofocus="autofocus" value="{{ old('email') }}" autocomplete="email">
              <label for="inputEmail">Email</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Mật khẩu" required="required" autocomplete="current-password">
              <label for="inputPassword">Mật khẩu</label>
            </div>
          </div>
          <!-- <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me" >
                Nhớ mật khẩu 
              </label>
            </div>
          </div> -->
          <button class="btn btn-primary btn-block" href="index.html">Đăng nhập</button>
        </form>
        
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="Loginadmin/vendor/jquery/jquery.min.js"></script>
  <script src="Loginadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="Loginadmin/vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
