  @extends('admin.layout.index')
  @section('content')
   <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Khach hang 
                            <small>{{$customer->name}}</small>
                        </h1>
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
                        <form action="admin/khachhang/sua/{{$customer->id}}" method="POST" enctype="multipart/form-data">
                           <input type="hidden" name="_token" value="{{csrf_token()}}" />

                    
                            <div class="form-group">
                                <label>Tên </label>
                                <input class="form-control" name="name" value="{{$customer->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Gioi tinh </label>
                                <input class="form-control" name="gender" value="{{$customer->gender}}" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" value="{{$customer->email}}" />
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ  </label>
                                <input class="form-control" name="address" value="{{$customer->address}}" />
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại  </label>
                                <input class="form-control" name="phone_number" value="{{$customer->phone_number}}" />
                            </div>
                             <div class="form-group">
                                <label>Ghi chu</label>
                                <input class="form-control" name="note" value="{{$customer->note}}" />
                            </div>

                            
                            
                            <button type="submit" class="btn btn-default">Sửa </button>
                            <button type="reset" class="btn btn-default">Làm mới </button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

 @endsection   
