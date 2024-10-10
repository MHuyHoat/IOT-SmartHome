<html></html>
<head>
   @include('layouts.head')
   @stack('styles')
</head>
<body class="bg-gray-900 text-white font-sans" >
   @include('elements.notice')
   <div class="p-4">
      <!-- Header -->
       @include('layouts.header')
       {{-- Sidebar --}}
       @include('layouts.sidebar')
       <div id="content">
         @yield('content')
       </div>

      @include('layouts.footer')
  </div>
    @stack('scripts')
</body>
</html>