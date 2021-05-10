 @extends('master')
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
                                <th>Tổng tiền </th>
                                <th>Thanh toán</th>
                                <th>Note  </th>
                                <th>Thời gian đặt hàng</th>
                                <th>Chi tiết </th>
                                <th>Huỷ </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $o)
                            <tr class="odd gradeX" align="center">
                            @foreach($customers as $c)
                                @if($o->id_customer==$c->id)
                                    <td class="center">{{$o->id}}</td>
                                    <td class="center">{{$o->total}}</td>
                                    @if($o->payment)
                                    @if($o->payment->state==1)
                                    <td class="center">Yes</td>
                                    @else
                                    <td class="center">No</td>
                                    @endif
                                    @else
                                    <td class="center">Yes</td>
                                    @endif
                                    <td class="center">{{$o->note}}</td>
                                    <td class="center">{{$o->created_at}}</td>
                                    @if($o->note=='Cancelled')
                                        <td class="center"><i class="fa fa-eye fa-fw"></i><a href="donhangchitiet/{{$o->id}}"> Chi tiết </a></td>
                                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i> Huỷ </td>
                                    
                                    @else
                                         <td class="center"><i class="fa fa-eye fa-fw"></i><a href="donhangchitiet/{{$o->id}}"> Chi tiết </a></td>
                                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="huydonhang/{{$o->id}}"> Huỷ </a></td>
                                    @endif
                                @endif
                             @endforeach   
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