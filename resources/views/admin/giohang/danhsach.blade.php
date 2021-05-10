 @extends('admin.layout.index')
 @section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Giỏ hàng
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
                                <th>ID User</th>
                                <th>Sản phẩm</th>
                                <th>Thời gian thêm vào giỏ</th>
                                <!-- <th>Xoá </th>
                                <th>Sửa </th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($carts as $cart)
                            <tr class="odd gradeX" align="center">
                                <td>{{$cart->id}}</td>
                                <td>{{$cart->id_user}}</td>
                                <td>{{$cart->product->name}}</td>
                                <td>{{$cart->created_at}}</td>
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