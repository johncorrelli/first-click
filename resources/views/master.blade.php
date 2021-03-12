<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>First Click</title>

        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css" />
    </head>
    <body class="antialiased">

    @if (!empty($companyName) || !empty($companyLogo))
    <div class="header">
        @if (!empty($companyLogo))
        <div class="company-logo"><img src="{{ $companyLogo }}" class="company-logo__pic" alt="Logo" /></div>
        @endif

        @if (!empty($companyName))
        <div class="company-name">{{ $companyName }}</div>
        @endif
    </div>
    @endif

    <div class="main-content">
        <div class="container">
        @yield('content')
        </div>
    </div>
    </body>
</html>
