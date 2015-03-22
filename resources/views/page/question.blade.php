@extends('app')
@section('content')
    @include('question.heavy', ['question' => $question])
@foreach ($question->answers()-get() as $answer)
    @include('answer', ['answer' => $answer])
@endforeach
@endsection
