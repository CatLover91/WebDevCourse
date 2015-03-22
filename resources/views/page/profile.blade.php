@extends('app')

@section('content')
<div class="row-fluid">
    <div class="col-xs-2">
         @include('slider.left', ['previous' => $leftConnector])
    </div>
    <div class="col-xs-8">
    @include('profile.heavy', ['user' => $user])
    @foreach ($user->questions()-get() as $question)
        @include('question.light', ['question' => $question])
    @endforeach
    </div>
    <div class="col-xs-2">
         @include('slider.right')
    </div>
</div>
@endsection
