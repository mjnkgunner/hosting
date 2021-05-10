 @extends('admin.layout.index')
 @section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Comment
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
                                <th>Id_user</th>
                                <th>Id_product</th>
                                <th>Content </th>
                                <th>Points</th>
                                <th>IsActive</th>
                                <th>Created_at</th>
                                <th>Updated_at</th>
                                <th>Active</th>
                                <th>Not Active</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($comments as $comment)
                            <tr class="odd gradeX" align="center">
                                <td>{{$comment->id}}</td>
                                <td>{{$comment->id_user}}</td>
                                <td>{{$comment->id_product}}</td>
                                <td>{{$comment->content}}</td>
                                <td>{{$comment->points}}</td>
                                <td>{{$comment->is_active}}</td>
                                <td>{{$comment->created_at}}</td>
                                <td>{{$comment->updated_at}}</td>
                                <td class="center"><i class="fa fa-pencil  fa-fw"></i><a href="admin/comment/hien/{{$comment->id}}"> Active</a></td>
                                <td class="center"><i class="fa fa-trash-o fa-fw"></i> <a href="admin/comment/an/{{$comment->id}}">Not Active </a></td>
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