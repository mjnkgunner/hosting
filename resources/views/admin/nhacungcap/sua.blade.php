  @extends('admin.layout.index')
  @section('content')
   <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Nhà cung cấp
                            <small>{{$supplier->name}} </small>
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
                        <form action="admin/nhacungcap/sua/{{$supplier->id}}" method="POST" enctype="multipart/form-data">
                           <input type="hidden" name="_token" value="{{csrf_token()}}" />
                
                            <div class="form-group">
                                <label>Tên </label>
                                <input class="form-control" name="name" value="{{$supplier->name}}" />
                            </div>
                           <div class="form-group">
                                <label>Địa chỉ </label>
                                <input class="form-control" name="address" value="{{$supplier->address}}" />
                            </div>
                             <div class="form-group">
                                <label>Sô điện thoại </label>
                                <input class="form-control" name="phone" value="{{$supplier->phone}}" />
                            </div>
                             <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" value="{{$supplier->email}}" />
                            </div>
                             <div class="form-group">
                                <label>Website</label>
                                <input class="form-control" name="website" value="{{$supplier->website}}" />
                            </div>
                            <div class="form-group">
                                 <label>Hình ảnh </label>
                                  <p> <img width="150px" src="source/image/supplier/{{$supplier->image}}"></p>
                                 <input type="file" name="Hinh" value="{{$supplier->image}}" class="form-control">
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