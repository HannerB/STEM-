
<figure class="main-banner type2">
    <div class="wrapper wrapper-full-page">
        @include('dashboard.layouts.navbars.navs.guest')
        <div class="page-header login-page header-filter" filter-color="black" style="background-image: url('{{ asset('img/emprende-futuro-768x327.jpg') }}'); background-size: cover; background-position: top center;align-items: center;" data-color="purple">
        @yield('content')
    </div>
</figure>
</div>
    