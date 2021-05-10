  @extends('admin.layout.index')
  @section('content')
   <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Vị trí
                            <small>{{$position->name}} </small>
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
                        <form action="admin/vitri/sua/{{$position->id}}" method="POST" enctype="multipart/form-data">
                           <input type="hidden" name="_token" value="{{csrf_token()}}" />

                           <div class="form-group">
                                <label>Bộ phận</label>
                                <select class="form-control" name="department">
                                    @foreach($departments as $department)
                                    <option @if($department->id_department==$department->id)
                                    {{'selected'}} @endif value="{{$department->id}}">{{$department->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                
                            <div class="form-group">
                                <label>Tên </label>
                                <input class="form-control" name="name" value="{{$position->name}}" />
                            </div>

                             <div class="form-group">
                                <label>Sô điện thoại </label>
                                <input class="form-control" name="phone" value="{{$position->phone}}" />
                            </div>
                            
                             <div class="form-group">
                                <label>Miêu tả</label>
                                <input class="form-control" name="description" value="{{$position->description}}" />
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