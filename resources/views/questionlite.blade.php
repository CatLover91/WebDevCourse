<div class="row-fluid color-box">
    <div class="col-xs-2">
        @if(Auth::guest() || Auth::user()->id === $question.asker_id)
            <label>{{ $question.Vote }}</label>
        @else
            <span class="fa-stack fa-lg">
                <i class="fa fa-square fa-stack-2x"></i>
                <i class="fa fa-chevron-up fa-stck-1x"></i>
            </span>
            <label>{{ $question.Vote }}</label>
            <span class="fa-stack fa-lg">
                <i class="fa fa-square fa-stack-2x"></i>
                <i class="fa fa-chevron-down fa-stack-1x"></i>
            </span>
        @endif
    </div>
    <div class="col-xs-8">
        <h2>{{ $question.Title }}</h2>
        <p>{{ $question.ContentLite }}</p>
    </div>
    <div class="col-xs-2">
        @if($Author.hasProfile())
            <!--Display Profile Photo-->
        @else
            <span class="fa-stack fa-lg">
                <i class="fa fa-square fa-stack-x2"></i>
                <i class="fa fa-user fa-stack-1x"></i>
            </span>
        @endif
    </div>
    <div class="col-xs-12">
        <label>{{ $question.Author.Name }}</label>
    </div>
</div>
