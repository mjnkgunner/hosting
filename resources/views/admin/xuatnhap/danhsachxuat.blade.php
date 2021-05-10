 @extends('admin.layout.index')
 @section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Xuất 
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
                                <th>Tên</th>
                                <th>Đơn vị </th>
                                <th>Số lượng</th>
                                <th>Hạn sử dụng</th>
                                <th>Thời gian xuất</th>
                                <th>User</th>
                                <!-- <th>Xoá </th>
                                <th>Sửa </th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($exports as $export)
                            <tr class="odd gradeX" align="center">
                                <td>{{$export->material->name}}</td>
                                <td>{{$export->unit}}</td>
                                <td>{{$export->quantity}}</td>
                                <td>{{$export->expire}}</td>
                                <td>{{$export->created_at}}</td>
                                <td>{{$export->id_user}}</td>
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