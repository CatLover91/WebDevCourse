@extends('app')

@section('content')
<div class="row-fluid">
    <div class="col-xs-5 color-block question">
        @if(Auth::guest())
            {{ $Vote }}
            <h2>{{ $Title }}</h2>
            <p>{{ $Content }}</p>
            @if($hasProfile)
                <!--Display Profile Photo-->
            @else
                <span class="fa-stack fa-lg">
                    <i class="fa fa-square-o fa-stack-x2"></i>
                    <i class="fa fa-user fa-stack-1x"></i>
                </span>
            @endif
            {{ $Author }}
        @else
            <span class="fa-stack fa-lg">
                <i class="fa fa-square fa-stack-2x"></i>
                <i class="fa fa-chevron-up fa-stack-1x"></i>
            </span>
            {{ $Vote }}
            <span class="fa-stack fa-lg">
                <i class="fa fa-square fa-stack-2x"></i>
                <i class="fa fa-chevron-down fa-stack-1x"></i>
            </span>
            <h2>{{ $Title }}</h2>
            <p>{{ $Content }}</p>
            @if($Author.hasProfile())
                <!--Display Profile Photo-->
            @else
                <span class="fa-stack fa-lg">
                    <i class="fa fa-square-o fa-stack-x2"></i>
                    <i class="fa fa-user fa-stack-1x"></i>
                </span>
            @endif
            {{ $Author }}
            <form method="post" action="".htmlspecialchars($_SERVER["PHP_SELF"])>
                <h3>Answer question</h3>
                <input type="text" placeholder="Title" name="qtitle"/><br/>
                <span class="error">* ".$qtitleErr."</span>
                <input type="text" placeholder="Content" name="qcontent"/><br/>
                <span class="error">* ".$qcontentErr."</span>
                <a href="#" class="small button" type="submit">Answer Question</a>
            </form>
        @endif
    </div>
</div>
@endsection