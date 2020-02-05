<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mailedit | Preset Template Designer </title>
    <link rel="stylesheet" href="//unpkg.com/grapesjs@0.10.7/dist/css/grapes.min.css">
    <link rel="stylesheet" href="{{ asset('css/editor/material.css')}}">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> -->
    <link rel="stylesheet" href="{{ asset('css/editor/tooltip.css')}}">
    <link rel="stylesheet" href="{{ asset('css/editor/toastr.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/editor/grapesjs-preset-newsletter.css')}}">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//unpkg.com/grapesjs@0.10.7/dist/grapes.min.js"></script>
    <script src="{{ asset('js/editor/grapesjs-preset-newsletter.min.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js')}}"></script>


    <script src="{{ asset('js/editor/ajaxable.min.js')}}"></script>
</head>

<style>
    body,
    html {
        height: 100%;
        margin: 0;
    }

    .nl-link {
        color: inherit;
    }

    .info-link {
        text-decoration: none;
    }

    #info-cont {
        line-height: 17px;
    }

    .grapesjs-logo {
        display: block;
        height: 90px;
        margin: 0 auto;
        width: 90px;
    }

    .grapesjs-logo path {
        stroke: #eee !important;
        stroke-width: 8 !important;
    }

    #toast-container {
        font-size: 13px;
        font-weight: lighter;
    }

    #toast-container>div,
    #toast-container>div:hover {
        box-shadow: 0 0 12px rgba(0, 0, 0, 0.1);
        font-family: Helvetica, sans-serif;
    }

    #toast-container>div {
        opacity: 0.95;
    }
</style>

<body>
    <!-- <div id="gjs" style="height:0px; overflow:hidden"> -->
    {!! $preset_template->content !!}
    <!-- </div> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>

</html>