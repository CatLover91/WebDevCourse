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
<div class="row-fluid">
    <div class="col-xs-4 color-box profile">
        @if (Auth::guest())
            <a href="{{ url('/auth/login') }}">Login</a>
            <a href="{{ url('/auth/register') }}">Register</a>
        @else
            @if($hasProfile)
            <!--Show Profile Pic-->
            @else
                <span class="fa-stack fa-lg">
                    <i class="fa fa-square-o fa-stack-2x"></i>
                    <i class="fa fa-user fa-stack-1x"></i>
                </span>
            @endif
            {{ $username }}
            <a href="{{ url('/auth/logout') }}">Logout</a>

        @endif
    </div>
    <div class="col-xs-8">
        <div class="row-fluid color-box ask">
        @if (Auth::check())
            <!--Ask a question-->
        @endif
        </div>
        @include('view.questions', $topQuestions)
    </div>
</div>
@endsection

