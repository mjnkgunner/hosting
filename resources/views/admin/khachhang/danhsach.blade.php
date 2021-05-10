 @extends('admin.layout.index')
 @section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Khach hang
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
                                <th>Gioi tinh</th>
                                <th>Email </th>
                                <th>Địa chỉ  </th>
                                <th>Số điện thoại</th>
                                <th>Ghi chu</th>
                                <th>Order_time</th>
                                <th>Sửa </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($khachhang as $nd)
                            <tr class="odd gradeX" align="center">
                                <td>{{$nd->id}}</td>
                                <td>{{$nd->name}}</td>
                                <td>{{$nd->gender}}</td>
                                <td>{{$nd->email}}</td>
                                <td>{{$nd->address}}</td>
                                <td>{{$nd->phone_number}}</td>
                                <td>{{$nd->note}}</td>
                                <td>{{$nd->created_at}}</td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/khachhang/sua/{{$nd->id}}">Sửa </a></td>
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