<!DOCTYPE html>
<html x-data="data()" lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    {{-- <title>Ar-rahnu</title> --}}
    <link rel="shortcut icon" href="{{ asset('img/power_button.png') }}">
    <!-- Favicon -->

    <link rel="stylesheet" href="{{ asset('css/styles.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/app.css')}}" />

    <link rel="stylesheet" href="{{ asset('css/scrollbar.css')}}" />

    <link rel="stylesheet" href="{{ asset('cdn/animate.css')}}" />
    <link rel="stylesheet" href="{{ asset('cdn/sweetalert2.css')}}" />
    <script src="{{ asset('cdn/alpine.js')}}"></script>
    <script src="{{ asset('js/init-alpine.js')}}"></script>

    <script src="{{ asset('cdn/popper.js')}}"></script>
    <script src="{{ asset('cdn/tippy.js')}}"></script>

    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<style>
    .swiper-container {
        width: 100%;
        padding-top: 50px;
        padding-bottom: 50px;
    }

    .swiper-slide {
        background-position: center;
        background-size: cover;
        width: 40%;
        height: 40%;
    }
</style>
<body class="bg-gray-200 ">
    <div class="flex h-screen " :class="{ 'overflow-hidden': isSideMenuOpen }">
        @include('include.sidebar')

        <div class="flex flex-col flex-1 w-full overflow-y-auto">
            @include('include.topbar')
            <main class="relative z-0 flex-1 px-2 pb-8 bg-gray-200 md:px-6 sm:h-full">
                <div class="grid pb-10 mt-10 ">
                    {{-- content --}}
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>

    <!-- AJAX -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('cdn/sweetalert2.js') }}"></script>

    <script>
        window.addEventListener('swal',function(e){Swal.fire(e.detail);});
    </script>
    <script src="{{ url(mix('js/app.js')) }}"></script>
    <script src="{{ asset('cdn/sweetalert2.js')}}"></script>
    <script src="{{ asset('cdn/jquery.js')}}"></script>
    <script src="{{ asset('cdn/inputmask.js')}}"></script>

    <script>
        tippy('.tooltipbtn', {
            content:(reference)=>reference.getAttribute('data-title'),
            onMount(instance) {
                instance.popperInstance.setOptions({
                placement :instance.reference.getAttribute('data-placement')
                });
            },
            allowHTML: true,
        });
    </script>

    @stack('js')
</body>
</html>