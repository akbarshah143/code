<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	 @include('layouts.head')
    @include('layouts.title-meta')
   
</head>

@section('body')

    <body class="authentication-bg">
    @show
    @yield('content')
    @include('layouts.vendor-scripts')
</body>

</html>
