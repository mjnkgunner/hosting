  @extends('admin.layout.index')
  @section('content')
   <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Người dùng  
                            <small>{{$nd->full_name}}</small>
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
                        <form action="admin/nguoidung/sua/{{$nd->id}}" method="POST" enctype="multipart/form-data">
                           <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            
                           
                                <div class="form-group">
                                        <label>Bộ phận</label>
                                        <select class="form-control" name="department" id="department">
                                            <option 
                                                value="{{$nd->position->department->id }}">{{$nd->position->department->name}}
                                            </option>
                                        </select>
                                    </div>
                                    
                                   <div class="form-group">
                                        <label>Vị trí</label>
                                        <select class="form-control" name="position" id="position">
                                            <option 
                                                value="{{$nd->position->id}}">{{$nd->position->name}}
                                            </option>
                                        </select>
                                    </div>
                            
                            <div class="form-group">
                                <label>Tên </label>
                                <input class="form-control" name="name" value="{{$nd->full_name}}" />
                            </div>
                            <div class="form-group">
                                <label>Giới tính </label>
                                <select class="form-control" name="gender">
                                    <option value="{{$nd->gender}}">{{$nd->gender}}</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Ngày sinh </label>
                                <input class="form-control" name="dob" value="{{$nd->dob}}" />
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại  </label>
                                <input class="form-control" name="phone" value="{{$nd->phone}}" />
                            </div>
                            
                            <div class="form-group">
                                <label>Địa chỉ  </label>
                                <input class="form-control" name="address" value="{{$nd->address}}" />
                            </div>

                            <div class="form-group">
                                <input type="checkbox" id="changePassword" name="changePassword">
                                <label>Đổi mật khẩu</label>
                                <input type="password" class="form-control password" name="password" placeholder="Nhập mật khẩu mới" 
                                disabled="" 
                                />
                            </div>

                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="password" class="form-control password" name="passwordagain" placeholder="Nhập lại mật khẩu mới" 
                                disabled="" 
                                />
                            </div>
                            
                             <div class="form-group">
                                <label>Quyền  </label>
                                <select class="form-control" name="role">
<!--                                @if($nd->role==0)
 -->                                    <option value="0">Thường</option>
                                    <!-- <option value="1">Quản trị </option>
                                    @else
                                     <option value="1">Quản trị </option>
                                     <option value="0">Thường</option>
                                    
                                    @endif -->
                                    
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

@section('script')
<script>
    $(document).ready(function(){
        $("#changePassword").change(function(){
            if($(this).is(":checked"))
              {
                $(".password").removeAttr('disabled');
              } 
              else
              {
                $(".password").attr('disabled','');
              } 
        });
    });

</script>

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