@extends('app')

@section('content')
@include('view.profile.heavy', $author.user_id)
@foreach($questions as $question)
    @include('view.questionlite', $question)
@endforeach
@endsection
