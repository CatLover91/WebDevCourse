<div class="row question" id="{{ $question->user_id }}">
    <div class="container">
        <div class="row">
            <div class="col-xs-3">
                @include ('question.vote', ['question' => $question])
            </div>
            <div class="col-xs-7">
                <h3>{{ $question->title }}</h3>
                <p>{{ $question->content }}</p>
                @include ('profile.light', ['user' => $question->user])
            </div>
            <a href="/question/{{ $question->id }}" id="slider">
                <div class="col-xs-2">
                    <i class="fa fa-chevron-right"></i>
                </div>
            </a>
        </div>
    </div>
</div>
