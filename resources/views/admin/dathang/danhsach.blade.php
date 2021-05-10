 @extends('admin.layout.index')
 @section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Order Bill
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
                                <th>ID Account</th>
                                <th>Tên khách hàng </th>
                                <th>Giới tính</th>
                                <th>Địa chỉ</th>
                                <th>Số điện thoại</th>
                                <th>Tổng tiền </th>
                                <th>Note  </th>
                                <th>Thời gian đặt hàng</th>
                                <th>Thanh toán</th>
                                <th>Chi tiết </th>
                                <!-- <th>Xoá </th>
                                <th>Sửa </th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order as $o)
                            <tr class="odd gradeX" align="center">
                                <td>{{$o->id}}</td>
                                @foreach($customer as $c)
                                    @if($o->id_customer==$c->id)
                                    <td>{{$c->id_user}}</td>
                                    <td>{{$c->name}}</td>
                                    <td>{{$c->gender}}</td>
                                    <td>{{$c->address}}</td>
                                    <td>{{$c->phone_number}}</td>
                                    @endif
                                @endforeach   
                                <td>{{$o->total}}</td>
                                <td>{{$o->note}}</td>
                                <td>{{$o->created_at}}</td>
                                <td class="center"><a href="admin/dathang/xacnhanthanhtoan/{{$o->id}}">Xác nhận</a></td>
                                <td class="center"><i class="fa fa-eye fa-fw"></i><a href="admin/dathang/danhsachchitiet/{{$o->id}}"> Chi tiết </a></td>
                               <!--  <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/dathang/xoa/{{$o->id}}"> Xoá </a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/dathang/sua/{{$o->id}}">Sửa </a></td> -->
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