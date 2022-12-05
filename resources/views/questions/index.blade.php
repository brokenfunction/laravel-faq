@extends('template')

@section('content')
    <h3 class="pb-4 mb-4 fst-italic border-bottom">
        All Questions
    </h3>
    @foreach($questions as $question)
        <div class="card mb-4">
            <div class="card-body">
                <h3 class="card-title text-muted">{{ $question->title }}</h3>
                <p class="card-text">{{ $question->description }}</p>

                <a href="{{ route('questions.show', $question->id) }}" class="card-link">View Details</a>
            </div>
        </div>
    @endforeach
@endsection
