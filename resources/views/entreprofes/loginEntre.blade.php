<!DOCTYPE html>
<html lang="es">

<head>
    <!-- head -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Entre Profes</title>
    <link rel="icon" href="{{ asset('img/favicon-retina.png') }}" type="image/png">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css">

    <link href="{{ asset('dashboard/css/material-dashboard.css?v=2.1.1') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard/css/material-kit.min.css?v=2.0.7') }}" rel="stylesheet" />
    <!-- head -->
</head>

<body class="off-canvas-sidebar">
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N5KN7SX" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <div class="wrapper ">
        <figure class="main-banner type2">
            <div class="wrapper wrapper-full-page">
                <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
                    <div class="container">
                        <div class="navbar-wrapper">
                            <a class="navbar-brand" href="{{ url('/') }}"></a>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="navbar-toggler-icon icon-bar"></span>
                            <span class="navbar-toggler-icon icon-bar"></span>
                            <span class="navbar-toggler-icon icon-bar"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="{{ url('/') }}" class="nav-link">
                                        <i class="material-icons">arrow_back</i> volver
                                    </a>
                                </li>
                                <li class="nav-item active">
                                    <a href="{{ route('login') }}" class="nav-link">
                                        <i class="material-icons">person</i> Iniciar Sesión
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="page-header login-page header-filter" filter-color="black" style="background-image: url('{{ asset('img/emprende-futuro-768x327.jpg') }}'); background-size: cover; background-position: top center; align-items: center;" data-color="purple">
                    <div class="container" style="height: auto;">
                        <div class="row align-items-center">
                            <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
                                <form class="form" method="POST" action="{{ route('CardsProfes') }}">
                                    @csrf
                                    <div class="card card-login card-hidden mb-3">
                                        <div class="card-header card-header-info text-center">
                                            <div class="social-line">
                                                <img src="{{ asset('img/logo.svg') }}" alt="">
                                            </div>
                                            <h4 class="card-title"><strong>Iniciar Sesión</strong></h4>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-description text-center"></p>
                                            <div class="bmd-form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="material-icons">person</i>
                                                        </span>
                                                    </div>
                                                    <input type="text" name="email" class="form-control" placeholder="Nombre de usuario o Email..." value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                </div>
                                            </div>
                                            <div class="bmd-form-group mt-3">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="material-icons">lock_outline</i>
                                                        </span>
                                                    </div>
                                                    <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña..." required autocomplete="current-password">
                                                </div>
                                            </div>
                                            <div class="form-check mr-auto ml-3 mt-3">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="card-footer justify-content-center">
                                            <button type="submit" class="btn btn-info btn-link btn-lg">Iniciar Sesión</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </figure>
    </div>
    <div class="main-area">
        <div class="container portada">

        </div>
    </div>
    <div class="menu-fader"></div>
    <a id="scroll-top-btn" href="#" title="Volver arriba">&#8593;</a>
    </div>
    <!-- script -->
    <script src="{{ asset('dashboard/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/core/bootstrap-material-design.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>
    <!-- script -->
</body>

</html>
