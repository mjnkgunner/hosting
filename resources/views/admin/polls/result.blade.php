@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Polls
                            <small>Danh Sách </small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                      @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                        @endif
 {{ PollWriter::drawResult($poll->id) }}
	<br>
  <div class="form-group">
        <a href="admin/polls/_list" class="btn btn-primary float-lg-left">Quay Lại</a>
  </div>
</div>
</div>
</div>
@endsection