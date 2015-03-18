@extends('app')

@section('content')
<!--
=====================================================================================================
                                             Splash
=====================================================================================================
-->
<div class="row-fluid color-box splash">
    <h1>Q & A</h1>
    <p><a href="http://github.com/catlover91/ODUCS418">Github Repo</a><br/>You can find the code for this website here.</p>
</div>

<!--
============================================================================
                                Main Block
============================================================================
-->
<div class="row-FLuid">
    <div class="col-xs-2">
         @include('view.slider.right', $rightConnector)
    </div>
    <div class="col-xs-8">
        <div class="col-xs-4 color-box profile">
            @if (Auth::guest())
                <a href="{{ url('/auth/login') }}">Login</a>
                <a href="{{ url('/auth/register') }}">Register</a>
            @else
                @include('view.profile.light', ['user' => Auth::user())
                <a href="{{ url('/auth/logout') }}">Logout</a>
            @endif
        </div>
        <div class="col-xs-8">
            <div class="row-fluid color-box ask">
            @if(Auth::check())
                {{ Form::open(array('url' => 'question/add')) }}

                    {{ Form::label('title', 'Title' }}
                    {{ Form::text('title') }}

                    {{ Form::label('content', 'Content' }}
                    {{ Form::textarea('content') }}

                    {{ Form::submit('Submit', array('class'=>'send-btn')) }}
                {{ Form::close() }}
            @endif
            </div>
            @foreach($questions as $question)
                 @include('view.question.light', ['question' => $question])
            @endforeach
        </div>
    </div>
    <div class="col-xs-2">
         @include('view.slider.left', $leftConnector)
    </div>
</div>
@endsection

