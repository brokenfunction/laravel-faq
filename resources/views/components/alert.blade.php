@if (session()->has('message'))
    <div class="alert alert-{{ Session::get('class', 'info') }}">
        {{ session('message') }}
    </div>
@endif
