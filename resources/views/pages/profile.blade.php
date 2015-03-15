@extends('app')

@section('content')
<div class="row-fluid color-box profile">
    @if($hasProfile)
        <!--Show Profile Pic-->
    @else
        <span class="fa-stack fa-lg">
            <i class="fa fa-square-o fa-stack-2x"></i>
            <i class="fa fa-user fa-stack-1x"></i>
        </span>
        <!--Offer to upload profile picture-->
    @endif
    {{ $userName }}
</div>
@include('view.questions', $profileQuestions)
@endsection