  @extends('admin.layout.index')
  @section('content')
   <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Nguyên liệu
                            <small>{{$material->name}}</small>
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
                        <form action="admin/nguyenlieu/sua/{{$material->id}}" method="POST" enctype="multipart/form-data">
                           <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            
                            <div class="form-group">
                                <label>Nhà cung cấp</label>
                                <select class="form-control" name="supplier">
                                    @foreach($suppliers as $supplier)
                                    <option @if($supplier->id_supplier==$supplier->id)
                                    {{'selected'}} @endif value="{{$supplier->id}}">{{$supplier->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                           <div class="form-group">
                                <label>Loại nguyên liệu</label>
                                <select class="form-control" name="type">
                                    @foreach($types as $type)
                                    <option @if($material->id_type==$type->id)
                                    {{'selected'}} @endif value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                
                            <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" name="name" value="{{$material->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Miêu tả </label>
                                <input class="form-control" name="description" value="{{$material->description}}" />
                            </div>
                            <div class="form-group">
                                 <label>Hình ảnh </label>
                                 <p> <img width="150px" src="source/image/material/{{$material->image}}"></p>
                                 <input type="file" name="Hinh" class="form-control">
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