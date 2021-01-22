<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>First Click</title>

        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="/app.css" />
    </head>
    <body class="antialiased">

    <div class="backdrop progress">
        <div class="progress-bar @yield('progress-bar-class', '') @yield('bg-color', '')" style="width: 100%"></div>
    </div>

    <div class="main-content @yield('no-vertical-center', 'vertical-center') text-center">
        <div class="container">
            <h1 class="display-3 text-center">@yield('h1', '')</h1>
            <div class="text-center">
                @yield('content')
            </div>
        </div>
    </div>

    <footer class="footer text-right @yield('bg-color', '')">
        <a class="text-light" href="/create">Create a claim</a>
    </footer>
    </body>
</html>
