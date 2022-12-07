@extends('layouts.app')

@section('content')
    <div class="bg-light p-5 rounded">
        <h1>Navbar example</h1>
        <p class="lead">This example is a quick exercise to illustrate how fixed to top navbar works. As you scroll, it will remain fixed to the top of your browser’s viewport.</p>
        <a class="btn btn-lg btn-primary" href="{{ route('questions.create') }}" role="button">Ask A Question »</a>
    </div>
@endsection
