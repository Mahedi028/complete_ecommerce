<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name')}}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @yield('before_head')
    </head>
    <body class="antialiased">

        {{-- header section --}}
        @include('frontend.partials.header')


          <main>

            @yield('main')

          </main>

        {{-- footer section --}}
        @include('frontend.partials.footer')
    </body>
</html>
