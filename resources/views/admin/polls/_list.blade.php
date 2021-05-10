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
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
            <tr class="table-primary">
                <thead>
            <tr>
                <th>ID</th>
                <th>Câu hỏi</th>
                <th>Lựa chọn</th>
                <th>Cho phép Guest</th>
                <th>Votes</th>
                <th>Trạng thái</th>
                <th>Edit</th>
                <th>Add Opts</th>
                <th>Remove Opts</th>
                <th>Remove</th>
                <th>Lock/Unlock</th>
            </tr>
        </thead>
            </tr>
            </thead>
            <tbody>
            @foreach($polls as $poll)
            <tr>
                <th scope="row">{{ $poll->id }}</th>
                <td><a href="admin/polls/result/{{$poll->id}}">{{ $poll->question }}</a></td>
                <td>{{ $poll->options_count }}</td>
                <td>{{ $poll->canVisitorsVote ? 'Yes' : 'No' }}</td>
                <td>{{ $poll->votes_count }}</td>
                <td>
                    @if($poll->isLocked())
                    <span class="label label-danger">Closed</span>
                    @elseif($poll->isComingSoon())
                    <span class="label label-info">Soon</span>
                    @elseif($poll->isRunning())
                    <span class="label label-success">Started</span>
                    @endif
                </td>
                <td>
                    <a class="btn btn-info btn-sm" href="admin/polls/edit/{{$poll->id}}">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>
                </td>
                <td>
                    <a class="btn btn-success btn-sm" href="admin/polls/options/push/{{$poll->id}}">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    </a>
                </td>
                <td>
                    <a class="btn btn-warning btn-sm" href="admin/polls/options/remove/{{$poll->id}}">
                        <i class="fa fa-minus-circle" aria-hidden="true"></i>
                    </a>
                </td>
                <td>
                    <form class="delete" action="admin/polls/remove/{{$poll->id}}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </button>
                    </form>
                </td>
                <td>
                    @php $route = $poll->isLocked()? 'polls/unlock': 'polls/lock' @endphp
                    @php $fa = $poll->isLocked()? 'fa fa-unlock': 'fa fa-lock' @endphp
                    <form class="lock" action="admin/{{$route}}/{{$poll->id}}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <button type="submit" class="btn btn-sm">
                            <i class="{{ $fa }}" aria-hidden="true"></i>
                        </button>
                    </form>
                </td>
                <td></td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <nav class="offset-md-5" aria-label="Page navigation example">
            {{ $polls->links() }}
        </nav>
    
    </div>
</div>
</div>
@endsection