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
            @include('view.profile.light', Auth::user()->id)
            <a href="{{ url('/auth/logout') }}">Logout</a>
        @endif
    </div>
    <div class="col-xs-8">
        <div class="row-fluid color-box ask">
        @if (Auth::check())
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/question/add') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label class="col-xs-4 control-label">Title</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="title">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-4 control-label">Content</label>
                    <div class="col-xs-6">
                        <input type="textarea" class="form-control" rows="20" cols="60" name="content">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6 col-xs-offset-4">
                        <button type="submit" class="btn btn-primary">Ask</button>
                    </div>
                </div>
            </form>
        @endif
        </div>
        @foreach($questions as $question)
             @include('view.question.light', $question)
        @endforeach
    </div>
</div>
@endsection

