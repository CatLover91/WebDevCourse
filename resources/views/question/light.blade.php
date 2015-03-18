<div class="row-fluid question" id="{{ $question->user_id }}">
    <div class="container">
        <div class="row">
            <div class="col-xs-3">
                @if(Auth::guest() || Auth::user()->id === $question->asker_id)
                    <label>{{ $question->vote }}</label>
                @else
                    @if(is_null(Auth::user()->votedOn($answer)))
                        <!-- No Vote -->
                        {{ Form::open(array('url' => 'question/'.$answer->question()->id.'/answer/'.$answer->id.'/upVote')) }}
                            {{ Form::vote(false, true) }}
                        {{ Form::close() }}

                        <label>{{ $answer->vote }}</label>

                        {{ Form::open(array('url' => 'question/'.$answer->question()->id.'/answer/'.$answer->id.'/downVote')) }}
                            {{ Form::vote(false, false) }}
                        {{ Form::close() }}
                    @elseif(Auth::user()->votedOn($answer)->positive)
                        <!--if positive vote-->
                        {{ Form::open(array('url' => 'question/'.$answer->question()->id.'/answer/'.$answer->id.'/removeVote')) }}
                            {{ Form::vote(true, true) }}
                        {{ Form::close() }}

                        <label>{{ $answer->vote }}</label>

                        {{ Form::open(array('url' => 'question/'.$answer->question()->id.'/answer/'.$answer->id.'/changeVote')) }}
                            {{ Form::vote(false, false) }}
                        {{ Form::close() }}
                    @else
                        <!--if negative vote-->
                        {{ Form::open(array('url' => 'question/'.$answer->question()->id.'/answer/'.$answer->id.'/changeVote')) }}
                            {{ Form::vote(false, true) }}
                        {{ Form::close() }}

                        <label>{{ $answer->vote }}</label>

                        {{ Form::open(array('url' => 'question/'.$answer->question()->id.'/answer/'.$answer->id.'/removeVote')) }}
                            {{ Form::vote(true, false) }}
                        {{ Form::close() }}
                    @else
                @endif
            </div>
            <div class="col-xs-9">
                <h3>{{ $question->title }}</h3>
                <p>{{ $question->contentLite }}</p>
                @include('view.profile.light', ['user' => $question->user())
            </div>
        </div>
    </div>
</div>
