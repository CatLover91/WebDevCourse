@extends('app')

@section('content')
<div class="row">
    <div class="col-xs-10">
        @if (Auth::check())
            <div class="row ask">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/question/add') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label class="span4 control-label">Title</label>
                        <div class="span6">
                            <input type="text" class="form-control" name="title">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="span4 control-label">Content</label>
                        <div class="span6">
                            <input type="textarea" class="form-control" name="content">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="span6 col-xs-offset-4">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        @endif
        @foreach ($questions as $question)
             @include ('question.light', ['question' => $question])
        @endforeach
    </div>
</div>
@endsection

