<div id="row-fluid color-block answer" id="{{ $answer->user_id }}">
    <div class="col-xs-2">
        @if (Auth::user()->id === $answer->question()->user()->id)
            @if ($answer.best)
                {{ Form::open(array('url' => 'question/'.$answer->question()->id.'/answer/'.$answer->id.'/unmarkBest')) }}
                    {{ Form::best(true) }}
                {{ Form::close() }}
            @else
                {{ Form::open(array('url' => 'question/'.$answer->question()->id.'/answer/'.$answer->id.'/markBest')) }}
                    {{ Form::best(false) }} 
                {{ Form::close() }}
            @endif
        @else
            @if ($answer.best)
                <span class="fa-stack fa-lg">
                    <i class="fa fa-square-o fa-stack-1x"></i>
                    <i class="fa fa-check fa-stack-1x"></i>
                </span>
            @else
                <i class="fa fa-square-o fa-lg"></i>
        @endif
    </div>
    <div class="col-xs-3">
        @include ('answer.vote', ['answer' => $answer])
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
