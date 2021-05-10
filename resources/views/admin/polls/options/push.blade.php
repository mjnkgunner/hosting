@extends('admin.layout.index')
@section('inline_css')
    <style>
        .errors-list{
            list-style-type: none;
        }
        .create-btn{
            display: block;
            width: 16%;
            float: right;
        }
        .old_options, .options, #options, .button-add {
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
                        <h1 class="page-header">Options
                            <small>Thêm </small>
                        </h1>
                    </div>
        <div class="well col-md-8 col-md-offset-2">
            @if($errors->any())
                <div class="alert alert-danger">
                    <span>Please fill empty inputs</span>
                </div>
            @endif
            @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                        @endif
            <form method="POST" action="admin/polls/options/add/{{$poll->id}}">
                {{ csrf_field() }}
                <!-- Question Input -->
                <div class="form-group">
                    <label for="question">{{ $poll->question }}</label>
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
                    <ul id="options">
                        <li>
                            <input type="text" name="options[0]" class="form-control add-input" placeholder="Insert your option" />
                            <a class="btn btn-danger" href="#" onclick='remove(this)'>
                                <i class="fa fa-minus-circle" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <ul>
                    <li class="button-add">
                        <div class="form-group">
                            <a class="btn btn-success" id="add">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            </a>
                        </div>
                    </li>
                </ul>
                <!-- Create Form Submit -->
                <div class="form-group">
                    <input name="Add" type="submit" value="Add" class="btn btn-primary create-btn" >
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection

@section('inline_script')
    <script type="text/javascript">
        function remove(current){
            current.parentNode.remove()
        }
        document.getElementById("add").onclick = function() {
            var e = document.createElement('li');
            e.innerHTML = "<input type='text' name='options[]' class='form-control add-input' placeholder='Insert your option' /> <a class='btn btn-danger'  onclick='remove(this)'><i class='fa fa-minus-circle' aria-hidden='true'></i></a>";
            document.getElementById("options").appendChild(e);
        }
    </script>
@endsection