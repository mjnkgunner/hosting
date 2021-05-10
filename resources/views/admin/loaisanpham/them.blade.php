  @extends('admin.layout.index')
  @section('content')
   <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loại sản phẩm 
                            <small>Thêm </small>
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
                        <form action="admin/loaisanpham/them" method="POST" enctype="multipart/form-data">
                           <input type="hidden" name="_token" value="{{csrf_token()}}" />
                
                            <div class="form-group">
                                <label>Tên loại sản phẩm </label>
                                <input class="form-control" name="tenlsp" placeholder="Nhập tên loại sản phẩm " />
                            </div>
                            <div class="form-group">
                                <label>Miêu tả </label>
                                <input class="form-control" name="mieuta" placeholder="Nhập miêu tả ngắn gọn" />
                            </div>
                            <div class="form-group">
                                 <label>Hình ảnh </label>
                                 <input type="file" name="Hinh" class="form-control">
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