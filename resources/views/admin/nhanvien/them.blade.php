  @extends('admin.layout.index')
  @section('content')
   <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Nhân viên
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
                        <form action="admin/nhanvien/them" method="POST" enctype="multipart/form-data">
                           <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            

                           <div class="form-group">
                                <label>Bộ phận</label>
                                <select class="form-control" name="department" id="department">
                                    @foreach($departments as $department)
                                    <option value="{{$department->id}}">{{$department->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                           <div class="form-group">
                                <label>Vị trí</label>
                                <select class="form-control" name="position" id="position">
                                    @foreach($positions as $position)
                                    <option value="{{$position->id}}">{{$position->name}}</option>
                                    @endforeach
                                </select>
                            </div>


                           <div class="form-group">
                                <label>Lương</label>
                                 <input class="form-control" name="salary" placeholder="Nhập lương nhân viên" />
                            </div>
                    
                            <div class="form-group">
                                <label>Tên </label>
                                <input class="form-control" name="name" placeholder="Nhập tên của nhân viên" />
                            </div>
                            <div class="form-group">
                                <label>Giới tính </label>
                                <select class="form-control" name="gender">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Ngày sinh </label>
                                <input type="datetime-local" class="form-control" name="dob"/>
                            </div>

                            <div class="form-group">
                                <label>Email </label>
                                <input type="email" class="form-control" name="email" placeholder="Nhập email của nhân viên" />
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại  </label>
                                <input class="form-control" name="phone" placeholder="Nhập số điện thoại" />
                            </div>
                            
                            <div class="form-group">
                                <label>Địa chỉ  </label>
                                <input class="form-control" name="address" placeholder="Nhập địa chỉ" />
                            </div>

                            <div class="form-group">
                                <label> Mật khẩu</label>
                                <input type="password" class="form-control password" name="password" placeholder="Nhập mật khẩu " 
                                 
                                />
                            </div>

                            <div class="form-group">
                                <label>Nhập lại mật khẩu</label>
                                <input type="password" class="form-control password" name="passwordagain" placeholder="Nhập lại mật khẩu " 
                            
                                />
                            </div>
                            
                             <div class="form-group">
                                <label>Quyền  </label>
                                <select class="form-control" name="role">
                                    <option value="0">Thường</option>
<!--                                     <option value="1">Quản trị </option>
 -->                                </select>
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
 @section('script')
    
    <script>
        $(document).ready(function(){
            $("#department").change(function(){
                var id_department=$(this).val();
                $.get("admin/ajax/vitri/"+id_department,function(data){
                    $("#position").html(data);
                });
            });
        });
            
        
    </script> 
@endsection     
