<html>

<head>
    @include('layouts.head')
    @yield('styles')
</head>

<body>
    @include('layouts.header')
    <div id="content">
       @yield('content')
    </div>
    @include('layouts.footer')
</body>

</html>
