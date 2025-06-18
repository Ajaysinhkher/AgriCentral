<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Auth System</title>
   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/laravel-echo/dist/echo.iife.js"></script> 
    {{-- for carosuel swipercss link --}}
    <link href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    {{-- <script src="/js/app.js"></script> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900 flex flex-col min-h-screen">

    @auth
        @include('user.partials.navbar')
    @endauth

    <main class="mt-10 py-8 flex-grow">
        <div class="container mx-auto">
            @yield('content')
        </div>
    </main>


    {{-- footer section --}}
     @auth
        @include('user.partials.footer')
    @endauth


    <!--JAVASCRIPT CODE-->
    <script>
        var swiper = new Swiper(".progress-slide-carousel", {
        loop: true,
        fraction: true,
        autoplay: {
        delay: 1500,
        disableOnInteraction: false,
        },
        pagination: {
        el: ".progress-slide-carousel .swiper-pagination",
        type: "progressbar",
        },
        });
    </script>
</body>


</html>
