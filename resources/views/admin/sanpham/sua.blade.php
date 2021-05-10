  @extends('admin.layout.index')
  @section('content')
   <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm 
                            <small>{{$sanpham->name}}</small>
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
                        <form action="admin/sanpham/sua/{{$sanpham->id}}" method="POST" enctype="multipart/form-data">
                           <input type="hidden" name="_token" value="{{csrf_token()}}" />

                           <div class="form-group">
                                <label>Loại sản phẩm </label>
                                <select class="form-control" name="loaisanpham">
                                    @foreach($loaisp as $lsp)
                                    <option @if($sanpham->id_type==$lsp->id)
                                    {{'selected'}} @endif value="{{$lsp->id}}">{{$lsp->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                
                            <div class="form-group">
                                <label>Tên sản phẩm </label>
                                <input class="form-control" name="tensp" value="{{$sanpham->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Miêu tả </label>
                                <input class="form-control" name="mieuta" value="{{$sanpham->description}}" />
                            </div>
                            <div class="form-group">
                                 <label>Hình ảnh </label>
                                 <p> <img width="150px" src="source/image/product/{{$sanpham->image}}"></p>
                                 <input type="file" name="Hinh" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Giá  </label>
                                <input class="form-control" name="gia" value="{{$sanpham->unit_price}}" />
                            </div>
                            <div class="form-group">
                                <label>Giá khuyến mãi  </label>
                                <input class="form-control" name="giakm" value="{{$sanpham->promotion_price}}">
                            </div>
                            <div class="form-group">
                                <label>Đơn vị  </label>
                                <input class="form-control" name="donvi" value="{{$sanpham->unit}}" />
                            </div>
                             <div class="form-group">
                                <label>Tình trạng  </label>
                                <select class="form-control" name="tinhtrang">
                                    @if($sanpham->new==0)
                                    <option value="0">Cũ</option>
                                    <option value="1">Mới </option>
                                    @else
                                     <option value="1">Mới </option>
                                     <option value="0">Cũ</option>
                                    
                                    @endif
                                    
                                </select>
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