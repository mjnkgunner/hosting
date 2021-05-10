 @extends('admin.layout.index')
 @section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Nguyên liệu
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
                                <th>Mô tả </th>
                                <th>Loại nguyên liêu</th>
                                <th>Nhà cung cấp </th>
                                <th>Khối lượng</th>
                                <th>Xoá </th>
                                <th>Sửa </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($materials as $material)
                            <tr class="odd gradeX" align="center">
                                <td>{{$material->id}}</td>
                                <td>{{$material->name}}
                                    <img width="150px" src="source/image/material/{{$material->image}}"></td>
                                <td>{{$material->description}}</td>
                                <td>{{$material->material_type->name}}</td>
                                <td>{{$material->supplier->name}}</td>
                                <td>{{$material->total}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/nguyenlieu/xoa/{{$material->id}}"> Xoá </a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/nguyenlieu/sua/{{$material->id}}">Sửa </a></td>
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