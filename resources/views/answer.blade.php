@extends('app')

@section('content')
    <div id="row-fluid color-block answer">
        <div class="col-xs-2">
            @if(Auth::user()->id === $question.asker_id)
                @if($answer.best)
                    <span class="fa-stack fa-lg">
                        <!-- form method for unmarking best answer -->
                        <i class="fa fa-square-o fa-stack-1x"></i>
                        <i class="fa fa-check fa-stack-1x"></i>
                    </span>
                @else
                    <!-- form method for unmarking best answer -->
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
        <div class="col-xs-3">
            @if(Auth::guest() || Auth::user()->id === $answer.answerer_id)
                <label>{{ $answer.vote }}</label>
            @else
                <!--if no vote-->
                    <!-- form method for upvoting answer -->
                    <span class="fa-stack fa-lg">
                        <i class="fa fa-square fa-stack-2x"></i>
                        <i class="fa fa-chevron-up fa-stck-1x"></i>
                    </span>
                    <label>{{ $answer.vote }}</label>
                    <!-- form method for downvoting answer -->
                    <span class="fa-stack fa-lg">
                        <i class="fa fa-square fa-stack-2x"></i>
                        <i class="fa fa-chevron-down fa-stack-1x"></i>
                    </span>
                <!--if positive vote-->
                    <!-- form method for removing vote -->
                    <span class="fa-stack fa-lg">
                        <i class="fa fa-square fa-stack-2x"></i>
                        <i class="fa fa-chevron-up fa-stck-1x"></i>
                    </span>
                    <label>{{ $answer.vote }}</label>
                    <!-- form method for changing vote -->
                    <span class="fa-stack fa-lg">
                        <i class="fa fa-square fa-stack-2x"></i>
                        <i class="fa fa-chevron-down fa-stack-1x"></i>
                    </span>
                <!--if negative vote-->
                    <!-- form method for changing vote -->
                    <span class="fa-stack fa-lg">
                        <i class="fa fa-square fa-stack-2x"></i>
                        <i class="fa fa-chevron-up fa-stck-1x"></i>
                    </span>
                    <label>{{ $answer.vote }}</label>
                    <!-- form method for removing vote -->
                    <span class="fa-stack fa-lg">
                        <i class="fa fa-square fa-stack-2x"></i>
                        <i class="fa fa-chevron-down fa-stack-1x"></i>
                    </span>
                <!--endif-->
            @endif
        </div>
        <div class="col-xs-7">
            <div class="row-fluid">
                <h4>{{ $answer.title }}</h4>
                <p>{{ $answer.content }}</p>
            </div>
            <div class="row-fluid">
                @include('view.profile.light', $answer.answerer_id)
            </div>
        </div>
    </div>
@endsection
