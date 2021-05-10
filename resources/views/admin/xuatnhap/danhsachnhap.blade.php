 @extends('admin.layout.index')
 @section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Nhập 
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
                                <th>Giá/đơn vị</th>
                                <th>Hạn sử dụng</th>
                                <th>Thời gian nhập</th>
                                <th>User</th>
                                <!-- <th>Xoá </th>
                                <th>Sửa </th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($imports as $import)
                            <tr class="odd gradeX" align="center">
                                <td>{{$import->material->name}}</td>
                                <td>{{$import->unit}}</td>
                                <td>{{$import->quantity}}</td>
                                <td>{{$import->unit_price}}</td>
                                <td>{{$import->expire}}</td>
                                <td>{{$import->created_at}}</td>
                                <td>{{$import->id_user}}</td>
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