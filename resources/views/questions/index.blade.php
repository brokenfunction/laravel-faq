@extends('layouts.app')

@section('content')
    <div class="border-bottom pb-2 mb-4">
        <div class="row">
            <div class="col-6">
                <h3 class="fst-italic">
                    All Questions
                </h3>
            </div>
            <div class="col-6 text-end">
                <p class="badge bg-primary">
                    {{ $questions->total() }} {{ Str::plural('question', $questions) }}
                </p>
            </div>
        </div>
    </div>
    @foreach($questions as $question)
        <div class="card mb-4">
            <div class="card-header">
                <div class="row justify-content-between">
                    <div class="col">
                        {{ $question->user->name }} asked {{ $question->created_at->diffForHumans() }}
                    </div>
                    <div class="col text-end text-muted">
                        {{ $question->answers->count() }} {{ Str::plural('answer', $question->answers->count()) }}
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h3 class="card-title">
                    <a href="{{ route('questions.show', $question->id) }}" class="card-link text-decoration-none">{{ $question->title }}</a>
                </h3>
                <p class="card-text lead">{{ Str::limit($question->description, 120) }}</p>
            </div>
            <div class="card-footer">
                <a href="#"><span class="badge bg-secondary">PHP</span></a>
                <a href=""><span class="badge bg-secondary">MySQL</span></a>
                <a href=""><span class="badge bg-secondary">Laravel</span></a>
                <a href=""><span class="badge bg-secondary">Node.JS</span></a>
            </div>
        </div>
    @endforeach
    {{ $questions->links() }}
@endsection
