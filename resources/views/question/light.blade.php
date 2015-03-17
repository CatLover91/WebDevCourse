<div class="row-fluid color-box">
    <div class="col-xs-2">
        @if(Auth::guest() || Auth::user()->id === $question.asker_id)
            <label>{{ $question.vote }}</label>
        @else
            <span class="fa-stack fa-lg">
                <i class="fa fa-square fa-stack-2x"></i>
                <i class="fa fa-chevron-up fa-stck-1x"></i>
            </span>
            <label>{{ $question.vote }}</label>
            <span class="fa-stack fa-lg">
                <i class="fa fa-square fa-stack-2x"></i>
                <i class="fa fa-chevron-down fa-stack-1x"></i>
            </span>
        @endif
    </div>
    <div class="col-xs-8">
        <h2>{{ $question.title }}</h2>
        <p>{{ $question.contentLite }}</p>
    </div>
    <div class="col-xs-12">
        @include('view.profile.light', $author)
    </div>
</div>
