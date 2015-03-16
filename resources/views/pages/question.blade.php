@extends('app')
@section('content')
    @include('questionheavy.blade.php', $question)
@foreach($answers as $answer)
    @include('view.answer', $answer)
@endforeach
@endsection
