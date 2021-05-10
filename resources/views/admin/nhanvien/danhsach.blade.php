 @extends('admin.layout.index')
 @section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Nhân viên
                            <small>Danh Sách </small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                      @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                        @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Giới tính</th>
                                <th>Ngày sinh</th>
                                <th>Email </th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Vị trí</th>
                                <th>Lương</th>
                                <th>Trạng thái</th>
<!--                                 <th>Quyền</th>
 -->                             <th>Xoá </th>
                                <th>Sửa </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($staffs as $staff)
                            <tr class="odd gradeX" align="center">
                                <td>{{$staff->id}}</td>
                                <td>{{$staff->user->full_name}}</td>
                                <td>{{$staff->user->gender}}</td>
                                <td>{{$staff->user->dob}}</td>
                                <td>{{$staff->user->email}}</td>
                                <td>{{$staff->user->phone}}</td>
                                <td>{{$staff->user->address}}</td>
                                <td>{{$staff->user->position->name}}</td>
                                <td>{{$staff->salary}}</td>
                                <td>{{$staff->is_active}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/nhanvien/xoa/{{$staff->id}}"> Xoá </a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/nhanvien/sua/{{$staff->id}}">Sửa </a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection