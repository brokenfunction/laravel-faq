@extends('layouts.app')

@section('content')
    <h1>{{ $user->name }}</h1>
    <ul class="nav nav-tabs mb-3" id="user-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="questions" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Questions</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="answers" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Answers</button>
        </li>
    </ul>
    <div class="tab-content" id="user-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="questions">
            @if ($user->questions->count() > 0)
                <div class="list-group">
                    @foreach($user->questions as $question)
                        <a href=" {{ route('questions.show', $question->id) }}" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between align-items-center">
                                <h5 class="mb-0">{{ $question->title }}</h5>
                                <small class="text-muted">{{ $question->created_at->diffForHumans() }}</small>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <p>No asked questions yet.</p>
            @endif
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="answers">
            @if ($user->answers->count() > 0)
                <div class="list-group">
                    @foreach($user->answers as $answer)
                        <a href=" {{ route('questions.show', $answer->question->id) }}" class="list-group-item list-group-item-action">
                            <small class="text-muted fw-bolder">{{ $answer->question->title }}</small>
                            <div class="d-flex  justify-content-between align-items-center">
                                <p class="mb-0 w-75">{{ $answer->content }}</p>
                                <small class="text-muted">{{ $answer->created_at->diffForHumans() }}</small>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <p>No answers yet.</p>
            @endif
        </div>
    </div>
@endsection
