  @extends('admin.layout.index')
  @section('content')
   <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Xuất nhập
                            <small>Xuất </small>
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
                        @if(session('loi'))
                        <div class="alert alert-danger">
                            {{session('loi')}}
                        </div>
                        @endif
                        <form action="admin/xuatnhap/xuat" method="POST" enctype="multipart/form-data">
                           <input type="hidden" name="_token" value="{{csrf_token()}}" />

                           <div class="form-group">
                                <label>Nhà cung cấp</label>
                                <select class="form-control" name="supplier" id="supplier">
                                    @foreach($suppliers as $supplier)
                                    <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                           <div class="form-group">
                                <label>Nguyên liệu</label>
                                <select class="form-control" name="material" id="material">
                                    @foreach($materials as $material)
                                    <option value="{{$material->id}}">{{$material->name}}</option>
                                    @endforeach
                                </select>
                            </div>  
                            <div class="form-group">
                                <label>Đơn vị  </label>
                                <input class="form-control" name="unit" placeholder="Nhập đơn vị(cái, hộp,..)" />
                            </div>

                            <div class="form-group">
                                <label>Số lượng  </label>
                                <input class="form-control" name="quantity" placeholder="Nhập số lượng " />
                            </div>
                           
                            <div class="form-group">
                                <label>Hạn sử dụng</label>
                                <input type="datetime-local" class="form-control" name="expire"  />
                            </div>
                            
                            <button type="submit" class="btn btn-default">Xuất hàng </button>
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

 @section('script')
    
    <script>
        $(document).ready(function(){
            $("#supplier").change(function(){
                var id_supplier=$(this).val();
                $.get("admin/ajax/nguyenlieu/"+id_supplier,function(data){
                    $("#material").html(data);
                });
            });
        });
            
        
    </script> 

@endsection     
