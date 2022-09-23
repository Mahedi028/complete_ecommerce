{{-- header area --}}
@include('backend.partials.header')


       @include('backend.partials.navbar')


        <div id="layoutSidenav">
            {{-- sidebar area --}}
            @include('backend.partials.sidebar')


            <div id="layoutSidenav_content">
                {{-- content area --}}

                {{-- @include('backend.content') --}}
                @yield('content')

            </div>
        </div>
{{-- footer area  --}}
@include('backend.partials.footer')
