<div class="row-fluid color-box profile">
    @if($hasAvatar)
        <!--Show Profile Pic-->
    @else
        <span class="fa-stack fa-lg">
            <i class="fa fa-square-o fa-stack-2x"></i>
            <i class="fa fa-user fa-stack-1x"></i>
        </span>
        @if(Auth::user() === $id)
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/user/'.$id.'/addAvatar') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
                <label>Want to upload a photo?</label>
                <div class="form-group">
                    <input type="file" name="img">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        @endif
    @endif
    {{ $name }}
</div>
