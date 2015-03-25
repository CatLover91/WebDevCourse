<div class="row-fluid profile" id="{{ $user->id }}">
    <div class="container">
        @if ($user->hasAvatar())
            <div class="row">
                <div class="col-xs-6">
                    <img src="{{ $user->avatar() }}" alt="Avatar" class="img-rounded">
                </div>
                <div class="col-xs-6">
                    <h3>{{ $name }}</h3>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-xs-6">
                    <span class="fa-stack fa-lg">
                        <i class="fa fa-square-o fa-stack-2x"></i>
                        <i class="fa fa-user fa-stack-1x"></i>
                    </span>
                </div>
                <div class="col-xs-6">
                    <h3>{{ $name }}</h3>
                </div>
            </div>
            @if (Auth::user()->id === $user->id)
                <div class="row">
                    @if (Session::has('success'))
                        <div class="alert-box success">
                            <h2>{{ Session::get('success') }}</h2>
                        </div>
                    @endif
                    <div class="secure">Upload form</div>
                    {{ Form::open(array('url'=>'user/'.$user->id.'/addAvatar,'method'=>'POST', 'files'=>true)) }}
                    <div class="control-group">
                        <div class="controls">
                            {{ Form::file('image') }}
                           <p class="errors">{{$errors->first('image')}}</p>
                           @if (Session::has('error'))
                               <p class="errors">{{ Session::get('error') }}</p>
                           @endif
                        </div>
                    </div>
                    <div id="success"> </div>
                    {{ Form::submit('Submit', array('class'=>'send-btn')) }}
                    {{ Form::close() }}
                </div>
            @endif
        @endif
    </div>
</div>
