@extends('app', ['activePage' => 'inicio', 'titlePage' => __('EMPRENDE')])

@section('body')  
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N5KN7SX" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <div id="wrapper"> 
        @include('layouts.navbars.mega-menu')
        @include('layouts.page_template')  
        @include('layouts.footer')
        <div class="menu-fader"></div>
        <a id="scroll-top-btn" href="#" title="Volver arriba">&#8593;</a>
    </div>
@endsection