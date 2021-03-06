@extends('app')

@section('content')
<div class="row-fluid">
    <div class="col-xs-12 color-box">
        <h2>Login</h2>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label class="col-xs-4 control-label">Name</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-4 control-label">Password</label>
                <div class="col-xs-6">
                    <input type="password" class="form-control" name="password">
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-6 col-xs-offset-4">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"> Remember Me
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-6 col-xs-offset-4">
                    <button type="submit" class="btn btn-primary">Login</button>

                    <!--<a class="btn btn-link" href="{{-- url('/password/email') --}}">Forgot Your Password?</a>-->
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
