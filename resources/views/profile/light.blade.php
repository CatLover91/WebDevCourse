<div class="row-fluid">
  <div class="span3">
    @if (false)
        <a href="/user/{{ $user->id }}/profile">
            <img src="{{ $user->avatar() }}" alt="Go to Profile" class="img-thumbnail">
        </a>
    @else
        <a href="/user/{{ $user->id }}/profile">
            <span class="fa-stack fa-lg">
                <i class="fa fa-square fa-stack-x2"></i>
                <i class="fa fa-user fa-stack-1x"></i>
            </span>
       </a>
    @endif
  </div>
  <div class="span9">
    <a href="/user/{{ $user->id }}/profile">
      <label>{{ $user->name }}</label>
    </a>
  </div>
</div>
