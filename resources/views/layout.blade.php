<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sol'Air</title>

    <link rel="icon" type="image/png" href="{{ asset('img/logo_solair.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/79ac17b97c.js" crossorigin="anonymous"></script>


    {{-- JQuery --}}
    <!-- Inclure jQuery (à partir de CDN) en premier -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Ensuite, inclure jQuery UI (à partir de CDN) -->
    <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body class="antialiased">
    <style>
        html {
            height: 100%;
        }

        body {
            width: 100%;
            height: 100%;

            /* background: linear-gradient(to top, #373737, #647d62); */
            background-color: #054f68;

            overflow-y: hidden;

            background-image: url("{{ asset('img/background-3.png') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        #content-wrapper {
            width: 100%;

            padding: 1em 0;
            

            overflow-y: scroll;
            overflow-x: hidden;

            position: relative;

            /* background-image: url("{{ asset('img/background-3.png') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat; */
        }

        #page-wrapper {
            width: 100%;
        }

        /* #content-background-image {
            width: 100%;

            position: fixed;
            top: 0;
            left: 0;

            z-index: -1;
        } */

        /* scrollbar */
        ::-webkit-scrollbar {
            width: 15px;
        }

        ::-webkit-scrollbar-track {
            background: #00000000;
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(221, 182, 108, 0.5);
            border-radius: 100vh;
            border: 25px solid rgba(255, 255, 255, 0);

            transition: 0.3s all ease-in-out;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: rgba(221, 182, 108);
        }

        ::-webkit-scrollbar-thumb:active {
            background: #dedeab;
        }
    </style>
    @yield('styles')

    @include('components.navbar.navbar')
    <div id="content-wrapper">
        <div id="page-wrapper">
            @yield('content')
        </div>
        {{-- @include('components.footer.footer') --}}
    </div>

    @if (session('success'))
    @endif

    <script>
        $(function() {
            $('[data-bs-toggle="tooltip"]').tooltip();
        });

        function resizeLayout() {
            $('#content-wrapper').css('margin-top', $('.navbar').outerHeight());
            $('#content-wrapper').css('height', $('body').height() - $('.navbar').outerHeight());

            if (($('#page-wrapper').outerHeight() + 15) < $('#content-wrapper').height()) {
                $('#page-wrapper').css('height', $('#content-wrapper').height());
            }
        }

        function parallax() {
            var scrollPosition = $('#content-wrapper').scrollTop();
            $('body').css('background-position', '50% ' + (-scrollPosition * 0.3) + 'px');
            
            $('nav').css('opacity', 1 - scrollPosition/600);
        }

        function ajouterListenersLayout() {
            $(window).resize(function() {
                resizeLayout();
            });

            $('#content-wrapper').scroll(function() {
                parallax();
            });
        }

        $(document).ready(function() {
            resizeLayout();
            ajouterListenersLayout();
            parallax();
        });
    </script>
    @yield('scripts')
</body>

</html>
