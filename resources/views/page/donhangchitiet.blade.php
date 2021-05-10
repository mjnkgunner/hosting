 @extends('master')
 @section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Order Bill Detail
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
                                <th>Tên sản phẩm </th>
                                <th>Giá khuyến mãi</th>
                                <th>Số lượng</th>
                                <th>Giá 1 đơn vị</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($detail as $d)
                            <tr class="odd gradeX" align="center">
                                <td class="center">{{$d->id}}</td>
                                @foreach($product as $p)
                                    @if($d->id_product==$p->id)
                                    <td class="center">{{$p->name}}</td>
                                    <td class="center">{{$p->promotion_price}}</td>
                                    @endif
                                @endforeach   
                                <td class="center">{{$d->quantity}}</td>
                                <td class="center">{{$d->unit_price}}</td>
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