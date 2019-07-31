<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', config('app.name'))</title>
    @include('front.partials.head')
    @yield('head')
</head>
<body id="commerce">

<div class="search-wrapper section-padding-100">
    @include('front.partials.navbar')
    <div class="products-catagories-area clearfix">
        @yield('content')
    </div>
</div>
@include('front.partials.footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@yield('footer')
</body>
</html>



