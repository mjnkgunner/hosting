  @extends('admin.layout.index')
  @section('content')
   <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Bộ phận
                            <small>{{$department->name}} </small>
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
                        <form action="admin/bophan/sua/{{$department->id}}" method="POST" enctype="multipart/form-data">
                           <input type="hidden" name="_token" value="{{csrf_token()}}" />
                
                            <div class="form-group">
                                <label>Tên </label>
                                <input class="form-control" name="name" value="{{$department->name}}" />
                            </div>
                           <div class="form-group">
                                <label>Địa chỉ </label>
                                <input class="form-control" name="address" value="{{$department->address}}" />
                            </div>
                             <div class="form-group">
                                <label>Sô điện thoại </label>
                                <input class="form-control" name="phone" value="{{$department->phone}}" />
                            </div>
                             <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" value="{{$department->email}}" />
                            </div>
                             <div class="form-group">
                                <label>Miêu tả</label>
                                <input class="form-control" name="description" value="{{$department->description}}" />
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