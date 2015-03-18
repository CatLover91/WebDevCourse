@extends('app')

@section('content')
<div class="row-fluid">
    <div class="col-xs-2">
         @include('view.slider.right', $rightConnector)
    </div>
    <div class="col-xs-8">
    @include('view.profile.heavy', ['user' => $user])
    @foreach($user->questions()-get() as $question)
        @include('view.question.light', ['question' => $question])
    @endforeach
    </div>
    <div class="col-xs-2">
         @include('view.slider.left', $leftConnector)
    </div>
</div>
@endsection
