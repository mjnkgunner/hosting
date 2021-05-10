 @extends('admin.layout.index')
 @section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Khuyến mãi
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
                                <th>Code</th>
                                <th>Rate</th>
                                <th>Cost</th>
                                <th>From Date</th>
                                <th>To Date</th>
                                <td>Count</td>
                                <th>Active</th>
                                <th>Delete</th>
                                <th>Edit</th>
                                <!-- <th>Xoá </th>
                                <th>Sửa </th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($promotions as $promotion)
                            <tr class="odd gradeX" align="center">
                                <td>{{$promotion->id}}</td>
                                <td>{{$promotion->name}}</td>
                                <td>{{$promotion->code}}</td>
                                <td>{{$promotion->rate}}</td>
                                <td>{{$promotion->cost}}</td>
                                <td>{{$promotion->fromDate}}</td>
                                <td>{{$promotion->toDate}}</td>
                                <td>{{$promotion->count}}</td>
                                <td>{{$promotion->isActive}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/khuyenmai/xoa/{{$promotion->id}}"> Xoá </a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/khuyenmai/sua/{{$promotion->id}}">Sửa </a></td>
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