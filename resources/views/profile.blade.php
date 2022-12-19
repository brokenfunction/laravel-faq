@extends('layouts.app')

@section('content')
    <h1>{{ $user->name }}</h1>
    <hr/>
    <ul class="nav nav-tabs mb-3" id="user-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="questions-tab" data-bs-toggle="pill" data-bs-target="#questions" type="button" role="tab" aria-controls="questions" aria-selected="true">
                Questions
                <span class="badge text-bg-secondary">{{ $user->questions->count() }}</span>
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="answers-tab" data-bs-toggle="pill" data-bs-target="#answers" type="button" role="tab" aria-controls="answers" aria-selected="false">
                Answers
                <span class="badge text-bg-secondary">{{ $user->answers->count() }}</span>
            </button>
        </li>
    </ul>
    <div class="tab-content" id="user-tabContent">
        <div class="tab-pane fade show active" id="questions" role="tabpanel" aria-labelledby="questions">
            @if ($user->questions->count() > 0)
                <div class="list-group">
                    @foreach($user->questions as $question)
                        <a href=" {{ route('questions.show', $question->id) }}" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between align-items-center">
                                <p class="mb-0">{{ $question->title }}</p>
                                <small class="text-muted">{{ $question->created_at->diffForHumans() }}</small>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <p>No asked questions yet.</p>
            @endif
        </div>
        <div class="tab-pane fade" id="answers" role="tabpanel" aria-labelledby="answers">
            @if ($user->answers->count() > 0)
                <div class="list-group">
                    @foreach($user->answers as $answer)
                        <a href="{{ route('questions.show', $answer->question->id) }}" class="list-group-item list-group-item-action">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <p class="fw-bolder mb-0">{{ $answer->question->title }}</p>
                                <small class="text-muted">replied {{ $answer->created_at->diffForHumans() }}</small>
                            </div>
                            <div>{{ $answer->content }}</div>
                        </a>
                    @endforeach
                </div>
            @else
                <p>No answers yet.</p>
            @endif
        </div>
    </div>
@endsection
