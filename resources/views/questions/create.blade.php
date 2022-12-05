@extends('template')

@section('content')
    <div class="row">
        <form action="{{ route('questions.create') }}">
            {{ csrf_field() }}
            <div class="form-group mb-3">
                <label for="title" class="col-sm-2 col-form-label">Title:</label>
                <div class="col-6">
                    <input type="text" class="form-control" id="title">
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="description" class="col-sm-2 col-form-label">More information:</label>
                <div class="col-6">
                    <textarea class="form-control" id="description"></textarea>
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Submit Question">
        </form>
    </div>
@endsection
