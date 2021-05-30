<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
<div class="container">
    <header class="row">
        @include('includes.header')
    </header>
    <div id="main" class="row">
        @yield('content')
    </div>
    <footer class="row">
        @include('includes.footer')
    </footer>
    @yield('javascript')
</div>
</body>
</html>
