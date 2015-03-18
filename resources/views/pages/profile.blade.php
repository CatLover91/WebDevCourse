@extends('app')

@section('content')
    @include('view.profile.heavy', ['user' => $user])
    @foreach($user->questions()-get() as $question)
        @include('view.question.light', ['question' => $question])
    @endforeach
@endsection
