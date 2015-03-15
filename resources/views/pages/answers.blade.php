@extends('app')

@section('content')
    @foreach($answers as $answer)
        @include('view.answer', $answer)
    @endforeach
@endsection