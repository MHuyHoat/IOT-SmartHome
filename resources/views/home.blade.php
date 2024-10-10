<html></html>
<head>
   @include('layouts.head')
   @stack('styles')
</head>
<body class="bg-gray-900 text-white font-sans" >
   @include('elements.notice')
     <div  id="content">
        @yield('content')
     </div>
    @stack('scripts')
</body>
</html>