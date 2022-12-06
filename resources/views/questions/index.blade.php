@extends('template')

@section('content')
    <div class="row border-bottom pb-4 mb-4">
        <div class="col-6"><h3 class=" fst-italic">
                All Questions
            </h3></div>
        <div class="col-6">total {{$questions->total()}}</div>
    </div>
    @foreach($questions as $question)
        <div class="card mb-4">
            <div class="card-body">
                <h3 class="card-title text-muted">{{ $question->title }}</h3>
                <p class="card-text">{{ $question->description }}</p>

                <a href="{{ route('questions.show', $question->id) }}" class="card-link">View Details</a>
            </div>
            <div class="card-footer text-muted">
                {{ $question->created_at->diffForHumans() }}
            </div>
        </div>
    @endforeach
    {{ $questions->links() }}

@endsection
