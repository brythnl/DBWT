<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <title>E-Mensa @yield('title')</title>
        <link rel="stylesheet" href="/css/home.css">
    </head>
    <body>
        <header>
            @yield('header')
        </header>
        <main>
            @yield('content')
        </main>
        <footer>
            @yield('footer')
        </footer>
    </body>
</html>
