 @extends('admin.layout.index')
 @section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Người dùng 
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
                                <th>Điểm tích luỹ</th>
                                <th>Email </th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Vị trí</th>
<!--                                 <th>Quyền</th>
 -->                             <th>Xoá </th>
                                <th>Sửa </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($nguoidung as $nd)
                            <tr class="odd gradeX" align="center">
                                <td>{{$nd->id}}</td>
                                <td>{{$nd->full_name}}</td>
                                <td>{{$nd->gender}}</td>
                                <td>{{$nd->dob}}</td>
                                <td>{{$nd->points}}</td>
                                <td>{{$nd->email}}</td>
                                <td>{{$nd->phone}}</td>
                                <td>{{$nd->address}}</td>
                                <td>{{$nd->position->name}}</td>
                                <!-- <td>@if($nd->role=='1'){{'Quản trị'}}
                                    @else{{'Thường'}}
                                    @endif
                                </td> -->
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/nguoidung/xoa/{{$nd->id}}"> Xoá </a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/nguoidung/sua/{{$nd->id}}">Sửa </a></td>
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