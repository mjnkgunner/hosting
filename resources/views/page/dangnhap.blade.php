@extends('master')
@section('content')
<div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Đăng nhập vào trang HIBI</div>
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
        <form action="dangnhap" method="post" >
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Địa chỉ email" required="required" autofocus="autofocus">
              <label for="inputEmail">Email</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Mật khẩu" required="required">
              <label for="inputPassword">Mật khẩu</label>
            </div>
          </div>
          <div class="form-group">
            <!-- <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Nhớ mật khẩu 
              </label>
            </div> -->
            <div class="forget-password">
              <a href="quenmatkhau">Quên mật khẩu?</a>
            </div>
          </div>
          <button class="btn btn-primary btn-block" href="index.html">Đăng nhập</button>
        </form>
        
      </div>
    </div>
  </div>
@endsection