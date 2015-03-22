<div class="row-fluid question" id="{{ $question->user_id }}">
    <div class="container">
        <div class="row">
            <div class="span3">
                @if (Auth::guest() || Auth::user()->id === $question->asker_id)
                    <label>{{ $question->value }}</label>
                @elseif (is_null(Auth::user()->votedOn($answer)))
                    <!-- No Vote -->
                    <form method="POST" action="question/{{ $answer->question->id }}/answer/{{ $answer->id }}/upVote">
                        <input class="fa fa-chevron-up" type="submit">
                    </form>
                    <label>{{ $question->value }}</label>
                    <form method="POST" action="question/{{ $answer->question->id }}/answer/{{ $answer->id }}/downVote">
                        <input class="fa fa-chevron-down" type="submit">
                    </form>
                @elseif (Auth::user()->votedOn($answer)->positive)
                    <!--if positive vote-->
                    <form method="POST" action="question/{{ $answer->question->id }}/answer/{{ $answer->id }}/removeVote">
                        <input class="fa fa-chevron-up" type="submit">
                    </form>
                    <label>{{ $question->value }}</label>
                    <form method="POST" action="question/{{ $answer->question->id }}/answer/{{ $answer->id }}/changeVote">
                        <input class="fa fa-chevron-down" type="submit">
                    </form>
                @else
                    <!--if negative vote-->
                    <form method="POST" action="question/{{ $answer->question->id }}/answer/{{ $answer->id }}/changeVote">
                        <input class="fa fa-chevron-up" type="submit">
                    </form>
                    <label>{{ $question->value }}</label>
                    <form method="POST" action="question/{{ $answer->question->id }}/answer/{{ $answer->id }}/removeVote">
                        <input class="fa fa-chevron-down" type="submit">
                    </form>
                @endif
            </div>
            <div class="span9">
                <h3>{{ $question->title }}</h3>
                <p>{{ $question->content }}</p>
                @include ('profile.light', ['user' => $question->user])
            </div>
        </div>
    </div>
</div>
