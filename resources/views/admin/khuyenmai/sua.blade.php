  @extends('admin.layout.index')
  @section('content')
   <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Khuyến mãi
                            <small>{{$promotion->name}} </small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                            {{$err}} <br>
                            @endforeach
                        </div>
                        @endif
                        @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                        @endif
                        <form action="admin/khuyenmai/sua/{{$promotion->id}}" method="POST" enctype="multipart/form-data">
                           <input type="hidden" name="_token" value="{{csrf_token()}}" />

                            <div class="form-group">
                                <label>Tên </label>
                                <input class="form-control" name="name" value="{{$promotion->name}}" />
                            </div>
                             <div class="form-group">
                                <label>Code</label>
                                <input class="form-control" name="code" value="{{$promotion->code}}" />
                            </div>
                            <div class="form-group">
                                <label>Rate</label>
                                <input class="form-control" name="rate" value="{{$promotion->rate}}" />
                            </div>
                            <div class="form-group">
                                <label>Cost</label>
                                <input class="form-control" name="cost" value="{{$promotion->cost}}" />
                            </div>
                            <div class="form-group">
                                <label>From Date</label>
                                <input type="text" class="form-control" name="fromDate" value="{{$promotion->fromDate}}"/>
                            </div>  
                            <div class="form-group">
                                <label>To Date</label>
                                <input type="text" class="form-control" name="toDate" value="{{$promotion->toDate}}" />
                            </div>  
                             <div class="form-group">
                                <label>Active</label>
                                <select class="form-control" name="isActive">
                                    <option value="{{$promotion->isActive}}">{{$promotion->isActive}}</option>
                                    <option value="0">Not Active</option>
                                    <option value="1">Active</option>
                                </select>
                            </div>                      
                            
                            <button type="submit" class="btn btn-default">Sửa </button>
                            <button type="reset" class="btn btn-default">Làm mới </button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

 @endsection       