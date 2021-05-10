@extends('admin.layout.index')
@section('content')
	<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                    	<h1 class="page-header">
                            <small>Nguyên liệu sắp hết</small>
                        </h1>
                        @foreach($materials as $material)
					<h5>{{$material->name}} còn lại: {{$material->total}}- sđt nhà cc: {{$material->supplier->phone}}</h5>
						@endforeach						

                    </div>
                     <div class="col-lg-12">
                    	<h1 class="page-header">
                            <small>Tổng quan</small>
                        </h1>
                       
					<h5>Tổng Giá trị xuất: {{$exporttotal}} đồng </h5>
					<h5>Tổng Giá trị nhập: {{$importtotal}} đồng </h5>	
					<h5>Tổng Giá trị Đơn hàng: {{$moneytotal}} đồng </h5>	
                    <h5>Tổng lương phải trả: {{$totalsalary}} đồng </h5>
					<h5>Số lượng User: {{$countuser}} tài khoản </h5>
					<h5>Số lượng Order: {{$countbill}} đơn hàng </h5>
                    <h5>Số lượng Nhân viên: {{$totalstaff}} nhân viên</h5>
                    </div>
                    <div class="col-lg-12">
                    	<h1 class="page-header">
                            <small>Khuyến mãi đang chạy</small>
                        </h1>
                        @foreach($promotions as $promotion)
					<h5>{{$promotion->code}}--{{$promotion->count}} được sử dụng</h5>
						@endforeach						

                    </div>
                    <div class="col-lg-12">
                    	<h1 class="page-header">
                            <small>Khách hàng thân thiết</small>
                        </h1>
                        @foreach($users as $user)
					<h5>id:{{$user->id}}--{{$user->full_name}}:{{$user->points}} điểm--sđt: {{$user->phone}}--mail: {{$user->email}}</h5>
						@endforeach						

                    </div>
                    <div class="col-lg-12">
                    	<h1 class="page-header">
                            <small>Thống kê theo thời gian</small>
                        </h1>
                         <form action="admin/thongke" method="POST" enctype="multipart/form-data">
                           <input type="hidden" name="_token" value="{{csrf_token()}}" />

                           <div class="form-group">
                                <label>From Date</label>
                                <input type="datetime-local" class="form-control" name="fromDate" />
                            </div>  
                            <div class="form-group">
                                <label>To Date</label>
                                <input type="datetime-local" class="form-control" name="toDate" />
                            </div>
                            <button type="submit" class="btn btn-default">Thống kê </button>
                            <button type="reset" class="btn btn-default">Làm mới </button>
                       </form>
                    </div>
                </div>
            </div>
         </div>
@endsection