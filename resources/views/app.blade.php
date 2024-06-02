<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <!-- head -->
        @include('layouts.head')
        <!-- head -->
        @yield('css')
    </head>

    <body data-rsssl=1 class="page-template page-template-templates page-template-portada page-template-templatesportada-php page page-id-21">
        @yield('body')
    </body>

    <!-- script -->
    @include('layouts.script') 
    <!-- script -->
    @yield('js')
</html>
