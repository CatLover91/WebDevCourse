@extends('app')
@section('content')
    @include('slider.left', ['link' => $previous]
    @include('question.heavy', ['question' => $question])
@foreach ($question->answers()-get() as $answer)
    @include('answer', ['answer' => $answer])
@endforeach
@endsection
