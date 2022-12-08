@extends('layouts.app')

@section('content')
    @include('components.alert')
    <div class="row">
        <form method="POST" action="{{ route('questions.update', $question->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="title" class="col-12 col-form-label">Title:</label>
                <div class="col-12">
                    <input type="text" value="{{ $question->title }}" name="title" class="form-control @error('title') is-invalid @enderror" id="title">
                    <div class="invalid-feedback">
                        The title must be at least 15 characters.
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="description" class="col-12 col-form-label">What are the details of your problem?</label>
                <div class="col-12">
                    <textarea rows="8" style="overflow:auto;resize:none" name="description" class="form-control" id="description">{{ $question->description }}</textarea>
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Update Question">
        </form>
    </div>
@endsection
