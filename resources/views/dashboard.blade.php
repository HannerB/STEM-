<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- head -->
        @include('dashboard.layouts.css')
        <!-- head --> 
        @yield('css')
    </head>

    <body class="{{ $class ?? '' }}">
        <noscript>
            <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N5KN7SX" height="0" width="0"
                style="display:none;visibility:hidden">
            </iframe>
        </noscript>
        <div class="wrapper ">
            @guest
            @include('dashboard.layouts.page_templates.guest')
            @endguest
            @auth
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @include('dashboard.layouts.page_templates.auth')
            @endauth
            <div class="main-area">
                <div class="container portada">
                    
                </div>
            </div>
            <div class="menu-fader"></div>
            <a id="scroll-top-btn" href="#" title="Volver arriba">&#8593;</a>
        </div>
        <!-- script -->
        @include('dashboard.layouts.js')
        <!-- script -->
        @yield('js')
    </body>
</html>
