  @extends('admin.layout.index')
  @section('content')
   <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Khach hang
                            <small>Thêm</small>
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
                        <form action="admin/khachhang/them" method="POST" enctype="multipart/form-data">
                           <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                
                           
                            <div class="form-group">
                                <label>Tên </label>
                                <input class="form-control" name="name" placeholder="Nhập tên của khach hang" />
                            </div>

                            <div class="form-group">
                                <label>Gioi tinh </label>
                                <input class="form-control" name="gender" placeholder="Nhập gioi tinh của khach hang" />
                            </div>

                            <div class="form-group">
                                <label>Email </label>
                                <input type="email" class="form-control" name="email" placeholder="Nhập email của khach hang" />
                            </div>

                            <div class="form-group">
                                <label>Địa chỉ  </label>
                                <input class="form-control" name="address" placeholder="Nhập địa chỉ" />
                            </div>

                            <div class="form-group">
                                <label>Số điện thoại  </label>
                                <input class="form-control" name="phone_number" placeholder="Nhập số điện thoại" />
                            </div>
                            

                            <div class="form-group">
                                <label>Ghi chu</label>
                                <input class="form-control" name="note" placeholder="Nhập ghi chu" />
                            </div>
                            

                            
                            <button type="submit" class="btn btn-default">Thêm </button>
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
