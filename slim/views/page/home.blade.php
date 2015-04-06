@extends('app')

@section('content')
<div class="row">
    <div class="col-xs-10">
        @if (Auth::check())
            <div class="row ask">
                {{ Form::open(array('url' => '/question/add')) }}
                    {{ Form::token() }}
                    {{ Form::text('title') }}
                    {{ Form::text('content') }}
                    {{ Form::submit('Login') }}
                {{ Form::closr() }}
            </div>
        @endif
        @foreach ($questions as $question)
             @include ('question.light', ['question' => $question])
        @endforeach
    </div>
</div>
@endsection

