<div class="row-fluid">
    @if($user->hasAvatar())
        <img src="{{ $user->avatar() }}" alt="Avatar" class="img-rounded">
    @else
        <span class="fa-stack fa-lg">
            <i class="fa fa-square-o fa-stack-2x"></i>
            <i class="fa fa-user fa-stack-1x"></i>
        </span>
        @if(Auth::user()->id === $user->id)
            <div class="about-section">
                <div class="text-content">
                    <div class="span7 offset1">
                        @if(Session::has('success'))
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
                               @if(Session::has('error'))
                                   <p class="errors">{{ Session::get('error') }}</p>
                               @endif
                            </div>
                        </div>
                        <div id="success"> </div>
                        {{ Form::submit('Submit', array('class'=>'send-btn')) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        @endif
    @endif
    <h3>{{ $name }}</h3>
</div>
