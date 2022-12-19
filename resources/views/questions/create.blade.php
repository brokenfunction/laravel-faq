@extends('layouts.app')

@section('content')
    @include('components.alert')
    <div class="row">
        <div class="alert alert-success" role="alert">
            <h4 class="mb-1">
                Writing a good question
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 24 24">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"></path>
                </svg>
            </h4>
            <p class="mb-0">You’re ready to ask a programming-related question and this form will help guide you through the process.</p>
            Steps:
            <ul class="m-0 font-monospace" style="font-size: 90%;">
                <li>Summarize your problem in a one-line title.</li>
                <li>Describe your problem in more detail.</li>
                <li>Add “tags” which help surface your question to members of the community.</li>
            </ul>
        </div>
        <form method="POST" action="{{ route('questions.store') }}">
            @csrf
            <div class="form-group mb-3">
                <label for="title" class="col-12 col-form-label">Title:</label>
                <div class="col-12">
                    <input type="text" required placeholder="e.g. Is there an R function for finding the index of an element in a vector?" name="title" class="form-control @error('title') is-invalid @enderror" id="title">
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>
            </div>
            <div class="form-group mb-3">
                <label for="description" class="col-12 col-form-label">What are the details of your problem?</label>
                <div class="col-12">
                    <textarea rows="8" style="overflow:auto;resize:none" name="description" class="form-control question-editor" id="description"></textarea>
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Submit Question">
        </form>
    </div>
@endsection

@push('head')
    <script src="https://cdn.tiny.cloud/1/m73qz9kaacfqjjn0bt5rtinbphz5z7ool0o48fa454nf51ol/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
@endpush
