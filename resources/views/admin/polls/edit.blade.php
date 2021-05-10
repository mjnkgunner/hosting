@extends('admin.layout.index')
@section('inline_css')
    <style>
        .clearfix {
            clear: both;
        }

        .create-btn {
            display: block;
            width: 16%;
            float: right;
        }

        .old_options, .options, .button-add {
            list-style-type: none;
        }

        .add-input {
            width: 80%;
            display: inline-block;
            margin-right: 10px;
            margin-bottom: 10px;
        }
    </style>
@endsection
@section('content')
     <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Polls
                            <small>Edit</small>
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
            <form method="POST" action="admin/polls/update/{{$poll->id}}">
                {{ csrf_field() }}
                @method('patch')
                 <div class="form-group">
                <label>Question: </label>
                <textarea id="question" name="question" cols="30" rows="2" class="form-control" placeholder="Ex: Who is the best player in the world?">{{ old('question', $poll->question) }}</textarea>
            </div>
            <div class="form-group">
                <label>Options</label>
                <ul class="options">
                    @foreach($poll->options as $option)
                    <li>
                        <input class="form-control add-input" value="{{ $option->name }}" disabled />
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="form-group">
                <label>Number of options to be selected</label>
                <select name="count_check" class="form-control">
                    @foreach(range(1, $poll->optionsNumber()) as $i)
                    <option {{ $i==$poll->maxCheck? 'selected':'' }}>{{ $i }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group clearfix">
                <label>Options</label>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="starts_at">Starts at:</label>
                        <input type="datetime-local" id="starts_at" name="starts_at" class="form-control" value="{{ old('starts_at', \Carbon\Carbon::parse($poll->starts_at)->format('Y-m-d\TH:i')) }}" />
                    </div>

                    <div class="form-group col-md-6">
                        <label for="starts_at">Ends at:</label>
                        <input type="datetime-local" id="ends_at" name="ends_at" class="form-control" value="{{ old('ends_at', \Carbon\Carbon::parse($poll->ends_at)->format('Y-m-d\TH:i')) }}" />
                    </div>
                </div>
            </div>

            <div class="radio">
                <div class="form-group">
                    <label>
                        <input type="checkbox" name="canVisitorsVote" value="1" {{ old('canVisitorsVote', $poll->canVisitorsVote)  == 1 ? 'checked' : ''  }}> Allow to guests
                    </label>
                </div>
                <div class="form-group">
                    <label>
                        <input type="checkbox" name="close" {{ old('close', $poll->isLocked()) ? 'checked':'' }}> Close
                    </label>
                </div>
                <div class="form-group">
                    <label>
                        <input type="checkbox" name="canVoterSeeResult" {{ old('canVoterSeeResult', $poll->showResultsEnabled()) ? 'checked':'' }}> Can visitor see result
                    </label>
                </div>
            </div>
                <!-- Create Form Submit -->
                <div class="form-group">
                    <a href="admin/polls/_list" class="btn btn-secondary float-lg-left">Quay Lại</a>
                    <input name="update" type="submit" value="Cập nhật" class="btn btn-primary create-btn"/>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection