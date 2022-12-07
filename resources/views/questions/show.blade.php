@extends('layouts.app')

@section('content')
    <h1 class="display-6">{{ $question->title }}</h1>
    <p class="lead">{{ $question->description }}</p>
    <hr />
    <div class="row pb-3 align-items-center">
        <div class="col">
            <span class="text-muted">{{ $question->user->name }} asked {{ $question->created_at->diffForHumans() }}</span>
        </div>
        @if($question->user->id === Auth::id())
        <div class="col">
            <div class="text-end">
                <a class="btn btn-outline-primary" href="{{ route('questions.edit', $question->id) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"></path>
                    </svg>
                    Edit
                </a>
                <form class="d-inline" method="POST" action="{{ route('questions.destroy', $question->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"></path>
                        </svg>
                        Delete
                    </button>
                </form>
            </div>
        </div>
        @endif
    </div>
    @if ($question->answers->count() > 0)
        @foreach ($question->answers as $answer)
            <div class="card mb-4">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            {{ $answer->user->name }} replied {{ $answer->created_at->diffForHumans() }}
                        </div>
                        @if($answer->user->id === Auth::id())
                            <div class="col text-end">
                                <form class="d-inline" method="POST" action="{{ route('answers.destroy', $answer->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="border: none; background: transparent; outline: none; color: #eb4432;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <p class="mb-0">{{ $answer->content }}</p>
                </div>
            </div>
        @endforeach
    @else
        <p>There are no answers for this question yet. Please consider submitting one below!</p>
    @endif

    <form method="POST" action="{{ route('answers.store') }}">
        @csrf
        <div class="form-group mb-3">
            <label for="description" class="col-sm-2 col-form-label">Your Answer</label>
            <div class="col-12">
                <textarea rows="4" style="overflow:auto;resize:none;background: #fff;" name="content" class="form-control" id="description"></textarea>
            </div>
        </div>
        <input type="hidden" value="{{ $question->id }}" name="question_id">
        <input type="submit" class="btn btn-primary" value="Post Your Answer">
    </form>
@endsection
