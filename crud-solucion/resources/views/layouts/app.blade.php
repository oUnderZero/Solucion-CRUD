<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <style>
            .table {
                border-spacing: 0 15px;
            }
        
            i {
                font-size: 1rem !important;
            }
        
            .table tr {
                border-radius: 20px;
            }
        
            tr td:nth-child(n+9),
            tr th:nth-child(n+9) {
                border-radius: 0 .625rem .625rem 0;
            }
        
            tr td:nth-child(1),
            tr th:nth-child(1) {
                border-radius: .625rem 0 0 .625rem;
            }
        </style>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous">
        </script>
    
    </head>
    <body class="font-sans bg-gray-900 ">
        <x-jet-banner />

        <div class="min-h-screen ">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="mt-5">
                     
                        {{ $header }}
                   
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
