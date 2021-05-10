@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
      <div class="pull-left">
        <h6 class="inner-title">Đăng kí</h6>
      </div>
      <div class="pull-right">
        <div class="beta-breadcrumb">
          <a href="trangchu">Home</a> / <span>Đăng kí</span>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
  
  <div class="container">
    <div id="content">
      
      <form action="dangki" method="post" class="beta-form-checkout" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
 
        <div class="row">
          <div class="col-sm-3"></div>
            @if(count($errors)>0)
              <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                {{$err}} <br>
                @endforeach
              </div>
            @endif
            @if(session('thongbao'))
              <div class="alert alert-success">
                {{session('thongbao')}}
              </div>
            @endif
          <div class="col-sm-6">
            <h4>Đăng kí</h4>
            <div class="space20">&nbsp;</div>

            
            <div class="form-block">
              <label for="email">Email address*</label>
              <input type="email" name="email" required>
            </div>

            <div class="form-block">
              <label for="your_last_name">Fullname*</label>
              <input type="text" name="fullname" required>
            </div>
            <div class="form-block">
              <label for="your_last_name">Gender*</label>
              <select class="form-control" name="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
              </select>
            </div>
            <div class="form-block">
              <label for="your_last_name">DOB*</label>
              <input type="date" name="dob" required>
            </div>

            <div class="form-block">
              <label for="adress">Address*</label>
              <input type="text" name="address"  required>
            </div>


            <div class="form-block">
              <label for="phone">Phone*</label>
              <input type="text" name="phone" required>
            </div>
            <div class="form-block">
              <label for="phone">Password*</label>
              <input type="password" name="password" required>
            </div>
            <div class="form-block">
              <label for="phone">Repassword*</label>
              <input type="password" name="re_password" required>
            </div>
            <div class="form-block">
              <button type="submit" class="btn btn-primary">Register</button>
            </div>
          </div>
          <div class="col-sm-3"></div>
        </div>
      </form>
    </div> <!-- #content -->
  </div> <!-- .container -->
  @endsection