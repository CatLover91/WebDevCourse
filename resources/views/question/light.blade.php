<div class="row-fluid question" id="{{ $question->user_id }}">
    <div class="container">
        <div class="row">
            @include ('question.vote', ['question' => $question])
            <div class="span9">
                <h3>{{ $question->title }}</h3>
                <p>{{ $question->content }}</p>
                @include ('profile.light', ['user' => $question->user])
            </div>
        </div>
    </div>
</div>
