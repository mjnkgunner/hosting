@extends('master')
@section('content')
  <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Người dùng  
                            <small>{{$nguoidung->full_name}}</small>
                        </h1>
                        @if($sn == $date)
                         <div class="alert alert-success">
                        <h3>Happy birthday! Give you a Gift code discount 100K: BIRTHDAY100</h3>
                         </div>
                        @endif
                        <h5><a href="donhang">Đơn hàng</a></h5>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
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
					</div>
				</div>	
			</div>
			<form action="nguoidung" method="post" class="beta-form-checkout">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="row">
					<div class="col-sm-3"></div>
					@if(count($errors)>0)
						<div class="alert alert-danger">
							@foreach($errors->all() as $err)
							{{$err}}
							@endforeach
						</div>
					@endif
					@if(Session::has('thanhcong'))
						<div class="alert alert-success">{{Session::get('thanhcong')}}</div>
					@endif
					<div class="col-sm-6">
						<h4>Thông tin tài khoản </h4>
						<div class="space20">&nbsp;</div>


						 <div class="form-group">
                                <label>Tên </label>
                                <input class="form-control" name="fullname" value="{{$nguoidung->full_name}}" />
                           </div>
						<div class="form-group">
							<label for="gender">Giới tính *</label>
							<select class="form-control form-control-user" name="gender">
								<option value="{{$nguoidung->gender}}">{{$nguoidung->gender}}</option>
		                        <option value="male">Male</option>
		                        <option value="female">Female </option>
		                        <option value="other">Other</option>
                  			</select>
						</div>
						<div class="form-group">
							<label for="dob">Ngày sinh</label>
							<input type="text" name="dob" value="{{$nguoidung->dob}}" >
						</div>

						<div class="form-group">
                                <label>Địa chỉ  </label>
                                <input class="form-control" name="address" value="{{$nguoidung->address}}" />
                        </div>


						<div class="form-group">
                                <label>Số điện thoại  </label>
                                <input class="form-control" name="phone" value="{{$nguoidung->phone}}" />
                        </div>
                        <div class="form-group">
                                <label>Điểm tích luỹ </label>
                                <input class="form-control" name="points" value="{{$nguoidung->points}}" disabled="" />
                        </div>  	
						<div class="form-group">
                                <input  type="checkbox" id="changePassword" name="changePassword">
                                <label>Đổi mật khẩu</label>
                                <input type="password" class="form-control password" name="password" placeholder="Nhập mật khẩu mới" 
                                disabled="" 
                                />
                        </div>

                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input type="password" class="form-control password" name="passwordagain" placeholder="Nhập lại mật khẩu mới" 
                                disabled="" />
                        </div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Lưu </button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
</div>

@endsection

@section('script')
<script>
    $(document).ready(function(){
        $("#changePassword").change(function(){
            if($(this).is(":checked"))
              {
                $(".password").removeAttr('disabled');
              } 
              else
              {
                $(".password").attr('disabled','');
              } 
        });
    });

</script>
@endsection  