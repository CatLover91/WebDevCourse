@if (strlen($previous) === 0)
    <div class="col-xs-2 slider-left">
    </div>
@else
    <a href={{ $previous }}>
        <div class="col-xs-2 slider-left">
            <i class="fa fa-chevron-right"></i>
        </div>
    </a>
@endif