<div class="row-fluid">
  <div class="col-xs-3">
    @if($hasAvatar)
      <a href="{{ $previous."/user/".$id."/profile" }}">
        <!--Display Profile Photo-->
      </a>
    @else
      <a href="{{ $previous."/user/".$id."/profile" }}">
        <span class="fa-stack fa-lg">
          <i class="fa fa-square fa-stack-x2"></i>
          <i class="fa fa-user fa-stack-1x"></i>
        </span>
      </a>
    @endif
  </div>
  <div class="col-xs-9">
    <a href="{{ $previous."/user/".$id."/profile" }}">
      <label>{{ $name }}</label>
    </a>
  </div>
</div>
