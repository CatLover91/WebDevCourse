<div class="row-fluid question" id="{{ $question->user_id }}">
    <div class="container">
        @if (Auth::guest())
            <div class="col-xs-3">
                <label>{{ $question->vote }}</label>
            </div>
            <div class="col-xs-9">
                <h2>{{ $question->title }}</h2>
                <p>{{ $question->content }}</p>
                @include('view.profile.light', ['user' => $question->user()])
            </div>
        @else
            <div class="col-xs-3">
                @if (Auth::guest() || Auth::user()->id === $answer->answerer_id)
                    <label>{{ $answer->vote }}</label>
                @else
                    @if (is_null(Auth::user()->votedOn($answer)))
                        <!-- No Vote -->
                        {{ Form::open(array('url' => 'question/'.$answer->question()->id.'/answer/'.$answer->id.'/upVote')) }}
                            {{ Form::vote(false, true) }}
                        {{ Form::close() }}

                        <label>{{ $answer->vote }}</label>

                        {{ Form::open(array('url' => 'question/'.$answer->question()->id.'/answer/'.$answer->id.'/downVote')) }}
                            {{ Form::vote(false, false) }}
                        {{ Form::close() }}
                    @elseif (Auth::user()->votedOn($answer)->positive)
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
                <h2>{{ $question->title }}</h2>
                <p>{{ $question->content }}</p>

                @include('view.profile.light', ['user => $question->user])
            </div>
            <div class="col-xs-12">
                {{ Form::open(array('url' => 'question/'.$question->id.'/answer/add')) }}

                    {{ Form::label('title', 'Title' }}
                    {{ Form::text('title') }}

                    {{ Form::label('content', 'Content' }}
                    {{ Form::textarea('content') }}

                    {{ Form::submit('Submit', array('class'=>'send-btn')) }}
                {{ Form::close() }}
            </div>
        @endif
    </div>
</div>
