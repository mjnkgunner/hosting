@extends('admin.layout.index')

@section('inline_css')
    <style>
        .errors-list{
            list-style-type: none;
        }
    </style>
@endsection
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Options
                            <small>Xoá</small>
                        </h1>
                    </div>
   
        <div class="well col-md-8 col-md-offset-2">
            @if($errors->any())
                <ul class="alert alert-danger errors-list">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                        @endif
            <form method="POST" action="admin/polls/options/remove/{{$poll->id}}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <!-- Question Input -->
                <div class="form-group">
                    <label>{{ $poll->question }}</label>
                    <div class="radio">
                        @foreach($poll->options as $option)
                            <label>
                                <input type="checkbox" name="options[]" value={{ $option->id }}> {{ $option->name }}
                            </label>
                            <br/>
                        @endforeach
                    </div>
                </div>
                <!-- Create Form Submit -->
                <div class="form-group">
                    <input name="Delete" type="submit" value="Delete" class="btn btn-danger form-control" >
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
