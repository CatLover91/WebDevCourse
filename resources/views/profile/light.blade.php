<div class="row">
  <a href="/user/{{ $user->id }}">
      <div class="col-xs-3">
        @if(false)  
          <img src="{{ $user->avatar() }}" alt="Go to Profile" class="img-thumbnail">
        @else
          <span class="fa-stack fa-lg">
            <i class="fa fa-square fa-stack-x2"></i>
            <i class="fa fa-user fa-stack-1x"></i>
          </span>
        @endif
      </div>
      <div class="col-xs-9">
          <label>{{ $user->name }}</label>
      </div>
  </a>
</div>
