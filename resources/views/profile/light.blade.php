<div class="row-fluid">
  <div class="col-xs-3">
    @if($user->hasAvatar())
      <a href="{{ '/user/'.$id.'/profile' }}">
        <img src="{{ $user->avatar() }}" alt="Go to Profile" class="img-thumbnail">
      </a>
    @else
      <a href="{{ '/user/'.$id.'/profile' }}">
        <span class="fa-stack fa-lg">
          <i class="fa fa-square fa-stack-x2"></i>
          <i class="fa fa-user fa-stack-1x"></i>
        </span>
      </a>
    @endif
  </div>
  <div class="col-xs-9">
    <a href="{{ '/user/'.$id.'/profile' }}">
      <label>{{ $user->name }}</label>
    </a>
  </div>
</div>
