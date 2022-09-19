<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


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
