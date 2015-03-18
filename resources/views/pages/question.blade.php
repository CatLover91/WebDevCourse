@extends('app')
@section('content')
    @include('questionheavy.blade.php', ['question' => $question)
@foreach($question->answers()-get() as $answer)
    @include('view.answer', ['answer' => $answer)
@endforeach
@endsection
