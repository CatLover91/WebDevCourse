@extends('app')

@section('content')
    <div id="row-fluid color-block answer">
        <div class="col-xs-1">
            @if(Auth::user() === $answer.question.Author)
                @if($answer.best)
                    <span class="fa-stack fa-lg">
                        <i class="fa fa-square-o fa-stack-1x"></i>
                        <i class="fa fa-check fa-stack-1x"></i>
                    </span>
                @else
                    <i class="fa fa-square-o fa-lg"></i>
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
        <div class="col-xs-2">
            @if(Auth::guest() || Auth::user() != $answer.Author)
                <label>{{ $answer.vote }}</label>
            @else
                <span class="fa-stack fa-lg">
                    <i class="fa fa-square fa-stack-2x"></i>
                    <i class="fa fa-chevron-up fa-stck-1x"></i>
                </span>
                <label>{{ $answer.vote }}</label>
                <span class="fa-stack fa-lg">
                    <i class="fa fa-square fa-stack-2x"></i>
                    <i class="fa fa-chevron-down fa-stack-1x"></i>
                </span>
            @endif
        </div>
        <div class="col-xs-7">
            <h4>{{ $answer.title }}</h4>
            <p>{{ $answer.content }}</p>
        </div>
        <div class="col-xs-2">
            @if($Author.hasAvatar)
                <a href={{ $previous."/user/".$answer.answerer_id."/profile" }}>
                    <!--Display Profile Photo-->
                </a>
            @else
                <a href={{ $previous."/user/".$answer.answerer_id."/profile" }}>
                    <span class="fa-stack fa-lg">
                        <i class="fa fa-square-o fa-stack-x2"></i>
                        <i class="fa fa-user fa-stack-1x"></i>
                    </span>
                </a>
            @endif
        </div>
        <div class="col-xs-12">
            <a href={{ $previous."/user/".$answer.answerer_id."/profile" }}>
                <label>{{ $author.name }}</label>
            </a>
        </div>
    </div>
@endsection
