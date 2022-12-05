@extends('template')

@section('content')
    <h1>{{ $question->title }}</h1>
    <p class="lead">{{ $question->description }}</p>
    </hr>
@endsection
