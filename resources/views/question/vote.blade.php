@if (Auth::guest() || Auth::user()->id === $question->user->id)
    <label>{{ $question->value }}</label>
@elseif (is_null(Auth::user()->votedOn($answer)))
    <!-- No Vote -->
    <form method="POST" action="question/{{ $question->id }}/upVote">
        <input class="fa fa-chevron-up" type="submit">
    </form>
    <label>{{ $question->value }}</label>
    <form method="POST" action="question/{{ $question->id }}/downVote">
        <input class="fa fa-chevron-down" type="submit">
    </form>
@elseif (Auth::user()->votedOn($answer)->positive)
    <!--if positive vote-->
    <form method="POST" action="question/{{ $question->id }}/removeVote">
        <input class="fa fa-chevron-up voted" type="submit">
    </form>
    <label>{{ $question->value }}</label>
    <form method="POST" action="question/{{ $question->id }}/changeVote">
        <input class="fa fa-chevron-down" type="submit">
    </form>
@else
    <!--if negative vote-->
    <form method="POST" action="question/{{ $question->id }}/changeVote">
        <input class="fa fa-chevron-up" type="submit">
    </form>
    <label>{{ $question->value }}</label>
    <form method="POST" action="question/{{ $question->id }}/removeVote">
        <input class="fa fa-chevron-down voted" type="submit">
    </form>
@endif