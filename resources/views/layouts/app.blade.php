<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('includes/head')
    <body>
        @include('components/top-navigation')
        <main class="container">
            <div class="row">
                <div class="col-8">
                    @yield('content')
                </div>
                <div class="col-4">
                    @include('components/sidebar')
                </div>
            </div>
        </main>
    </body>
</html>
