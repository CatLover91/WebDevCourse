@extends('app')

@section('content')
    <div id="row-fluid color-block answer">
        <div class="col-xs-2">
            @if(Auth::user()->id === $answer->question()->user()->id)
                @if($answer.best)
                    {{ Form::open(array('url' => 'question/'.$answer->question()->id.'/answer/'.$answer->id.'/unmarkBest')) }}
                        {{ Form::best(true) }}
                    {{ Form::close() }}
                @else
                    {{ Form::open(array('url' => 'question/'.$answer->question()->id.'/answer/'.$answer->id.'/markBest')) }}
                        {{ Form::best(false) }} 
                    {{ Form::close() }}
                @endif
            @else
                @if($answer.best)
                    <span class="fa-stack fa-lg">
                        <i class="fa fa-square-o fa-stack-1x"></i>
                        <i class="fa fa-check fa-stack-1x"></i>
                    </span>
                @else
                    <i class="fa fa-square-o fa-lg"></i>
            @endif
        </div>
        <div class="col-xs-3">
            @if(Auth::guest() || Auth::user()->id === $answer.answerer_id)
                <label>{{ $answer.vote }}</label>
            @else
                @if(is_null(Auth::user()->votedOn($answer)))
                    <!-- No Vote -->
                    {{ Form::open(array('url' => 'question/'.$answer->question()->id.'/answer/'.$answer->id.'/upVote')) }}
                        {{ Form::vote(false, true) }}
                    {{ Form::close() }}
            
                    <label>{{ $answer.vote }}</label>
            
                    {{ Form::open(array('url' => 'question/'.$answer->question()->id.'/answer/'.$answer->id.'/downVote')) }}
                        {{ Form::vote(false, false) }}
                    {{ Form::close() }}
                @elseif(Auth::user()->votedOn($answer)->positive)
                    <!--if positive vote-->
                    {{ Form::open(array('url' => 'question/'.$answer->question()->id.'/answer/'.$answer->id.'/removeVote')) }}
                        {{ Form::vote(true, true) }}
                    {{ Form::close() }}
            
                    <label>{{ $answer.vote }}</label>
            
                    {{ Form::open(array('url' => 'question/'.$answer->question()->id.'/answer/'.$answer->id.'/changeVote')) }}
                        {{ Form::vote(false, false) }}
                    {{ Form::close() }}
                @else
                    <!--if negative vote-->
                    {{ Form::open(array('url' => 'question/'.$answer->question()->id.'/answer/'.$answer->id.'/changeVote')) }}
                        {{ Form::vote(false, true) }}
                    {{ Form::close() }}
            
                    <label>{{ $answer.vote }}</label>
            
                    {{ Form::open(array('url' => 'question/'.$answer->question()->id.'/answer/'.$answer->id.'/removeVote')) }}
                        {{ Form::vote(true, false) }}
                    {{ Form::close() }}
                @else
            @endif
        </div>
        <div class="col-xs-7">
            <div class="row-fluid">
                <h4>{{ $answer.title }}</h4>
                <p>{{ $answer.content }}</p>
            </div>
            <div class="row-fluid">
                @include('view.profile.light', ['user' => $answer->user()])
            </div>
        </div>
    </div>
@endsection
