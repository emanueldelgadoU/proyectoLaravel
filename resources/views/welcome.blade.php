<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <script src="https://cdn.tailwindcss.com"></script>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background-color: #fcf5eb
            }

            .enlace{

                float: right;
            }

        </style>
    </head>
    <body>
        <div class="relative flex items-top justify-center min-h-screen  sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="mt-5 mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="mt-5 mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="mt-5 mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Register</a>
                        @endif
                    @endauth
                </div>
            @endif












        </div>
    </body>
</html>
