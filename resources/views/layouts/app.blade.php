@php
if (App::environment('local')) {
    $pfad_assets = 'http://127.0.0.1/';
} else {
    $pfad_assets = 'https://leichtbewaff.net/invite/public/';
}
@endphp
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{asset($pfad_assets.'css/app.css')}}">
        <title>{{config('app.name', 'Invite')}}</title>
        <!-- ****** faviconit.com Favicons ****** -->
        <link rel="shortcut icon" href="https://leichtbewaff.net/invite/storage/app/public/cover_images/favicon/favicon.ico">
        <link rel="icon" sizes="16x16 32x32 64x64" href="https://leichtbewaff.net/invite/storage/app/public/cover_images/favicon/favicon.ico">
        <link rel="icon" type="image/png" sizes="196x196" href="https://leichtbewaff.net/invite/storage/app/public/cover_images/favicon/favicon-192.png">
        <link rel="icon" type="image/png" sizes="160x160" href="https://leichtbewaff.net/invite/storage/app/public/cover_images/favicon/favicon-160.png">
        <link rel="icon" type="image/png" sizes="96x96" href="https://leichtbewaff.net/invite/storage/app/public/cover_images/favicon/favicon-96.png">
        <link rel="icon" type="image/png" sizes="64x64" href="https://leichtbewaff.net/invite/storage/app/public/cover_images/favicon/favicon-64.png">
        <link rel="icon" type="image/png" sizes="32x32" href="https://leichtbewaff.net/invite/storage/app/public/cover_images/favicon/favicon-32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="https://leichtbewaff.net/invite/storage/app/public/cover_images/favicon/favicon-16.png">
        <link rel="apple-touch-icon" href="https://leichtbewaff.net/invite/storage/app/public/cover_images/favicon/favicon-57.png">
        <link rel="apple-touch-icon" sizes="114x114" href="https://leichtbewaff.net/invite/storage/app/public/cover_images/favicon/favicon-114.png">
        <link rel="apple-touch-icon" sizes="72x72" href="https://leichtbewaff.net/invite/storage/app/public/cover_images/favicon/favicon-72.png">
        <link rel="apple-touch-icon" sizes="144x144" href="https://leichtbewaff.net/invite/storage/app/public/cover_images/favicon/favicon-144.png">
        <link rel="apple-touch-icon" sizes="60x60" href="https://leichtbewaff.net/invite/storage/app/public/cover_images/favicon/favicon-60.png">
        <link rel="apple-touch-icon" sizes="120x120" href="https://leichtbewaff.net/invite/storage/app/public/cover_images/favicon/favicon-120.png">
        <link rel="apple-touch-icon" sizes="76x76" href="https://leichtbewaff.net/invite/storage/app/public/cover_images/favicon/favicon-76.png">
        <link rel="apple-touch-icon" sizes="152x152" href="https://leichtbewaff.net/invite/storage/app/public/cover_images/favicon/favicon-152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="https://leichtbewaff.net/invite/storage/app/public/cover_images/favicon/favicon-180.png">
        <meta name="msapplication-TileColor" content="#FFFFFF">
        <meta name="msapplication-TileImage" content="https://leichtbewaff.net/invite/storage/app/public/cover_images/favicon/favicon-144.png">
        <meta name="msapplication-config" content="https://leichtbewaff.net/invite/storage/app/public/cover_images/favicon/browserconfig.xml">
        <!-- ****** faviconit.com Favicons ****** -->
        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    </head>
    <body>
        @include('.inc.navbar')
        <main role="main" class="container h-100" style="padding-top: 28px">
        @yield('content')
        </main>
    </body>
    <script src="{{asset($pfad_assets.'js/app.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover()});
    </script>
</html>