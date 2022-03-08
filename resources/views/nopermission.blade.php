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

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="font-sans flex flex-col items-center mt-36 text-gray-900 antialiased">
            <span class=" text-xl text-red-600">You don't have enough permission.</span>
            <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf

                <x-jet-dropdown-link class="w-full mt-4 bg-red-600 text-white hover:text-black" href="{{ route('logout') }}"
                         @click.prevent="$root.submit();">
                    {{ __('Log Out') }}
                </x-jet-dropdown-link>
            </form>
        </div>
    </body>
</html>