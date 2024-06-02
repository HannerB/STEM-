<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ __('dashboard') }}</title>
<link rel="icon" href="{{ asset('img/favicon-retina.png') }}" type="image/png">
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css">

<link href="{{ asset('dashboard/css/material-dashboard.css?v=2.1.1') }}" rel="stylesheet" />
<link href="{{ asset('dashboard/css/material-kit.min.css?v=2.0.7') }}" rel="stylesheet" />
@yield('css')