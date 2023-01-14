<title>@yield('title')</title>

<!-- Bootstrap CSS -->
<link href="{{URL::asset('assets/vendor/fonts/circular-std/style.css')}}" rel="stylesheet">


<link rel="stylesheet" href="{{URL::asset('assets/libs/css/style.css')}}">
@if(App::getLocale() == 'en')

    <link rel="stylesheet" href="{{URL::asset('assets/libs/css/style.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">

@else
    <link rel="stylesheet" href="{{URL::asset('assets/libs/css/style_rtl.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/vendor/bootstrap/css/bootstrap_rtl.min.css')}}">

@endif


<link rel="stylesheet" href="{{URL::asset('assets/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
<link rel="stylesheet" href="{{URL::asset('assets/vendor/charts/chartist-bundle/chartist.css')}}">
<link rel="stylesheet" href="{{URL::asset('assets/vendor/charts/morris-bundle/morris.css')}}">
<link rel="stylesheet" href="{{URL::asset('assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css')}}">
<link rel="stylesheet" href="{{URL::asset('assets/vendor/charts/c3charts/c3.css')}}">
<link rel="stylesheet" href="{{URL::asset('assets/vendor/fonts/flag-icon-css/flag-icon.min.css')}}">
<link href="{{ URL::asset('css/wizard.css') }}" rel="stylesheet">
@yield('css')

<link rel="stylesheet" href="//cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
