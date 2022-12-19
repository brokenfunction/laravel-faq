@extends('layouts.app')

@section('content')
    @include('components.alert')
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [
                { value: 'First.Name', title: 'First Name' },
                { value: 'Email', title: 'Email' },
            ]
        });
    </script>
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
