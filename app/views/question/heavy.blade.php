<div class="row question" id="{{ $question->user_id }}">
    <div class="container">
        @include ('question.vote', ['question' => $question])
        @if (Auth::guest())
            <div class="col-xs-9">
                <h2>{{ $question->title }}</h2>
                <p>{{ $question->content }}</p>
                @include('view.profile.light', ['user' => $question->user()])
            </div>
        @else
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
