@extends('template')

@section('content')
    <h1>{{ $question->title }}</h1>
    <p class="lead">{{ $question->description }}</p>
    <hr />
    @if ($question->answers->count() > 0)
        @foreach ($question->answers as $answer)
            <div class="panel panel-default">
                <div class="panel-body">
                    <p>{{ $answer->content }}</p>
                </div>
            </div>
        @endforeach
    @else
        <p>There are no answers for this question yet. Please consider submitting one below!</p>
    @endif

    <form method="POST" action="{{ route('answers.store') }}">
        {{ csrf_field() }}
        <div class="form-group mb-3">
            <label for="description" class="col-sm-2 col-form-label">Submit Your Own Answer:</label>
            <div class="col-6">
                <textarea rows="4" style="overflow:auto;resize:none" name="content" class="form-control" id="description"></textarea>
            </div>
        </div>
        <input type="hidden" value="{{ $question->id }}" name="question_id">
        <input type="submit" class="btn btn-primary" value="Submit Answer">
    </form>
@endsection
