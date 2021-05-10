@extends('master')
@section('content')
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
    
    <form action="vote" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-arrow-right"></span> {{ $poll->question }}
                </h3>
            </div>
        </div>
        <div class="panel-body">
            <ul class="list-group">
                @foreach($poll->options as $option)
                    <li class="list-group-item">
                        <div class="radio">
                            <label>
                                <input value="{{ $option->id}}" type="radio" name="option">
                                {{ $option->name }}
                            </label>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="panel-footer">
            @if(Auth::check())
            <input type="submit" class="btn btn-primary btn-sm" value="Vote" />
            @else
            <h6>Vui lòng đăng nhập để có thể bình chọn!</h6>
            <input type="submit" class="btn btn-primary btn-sm" value="Vote"  disabled="" />
            @endif
        </div>
    </form>
    
@endsection