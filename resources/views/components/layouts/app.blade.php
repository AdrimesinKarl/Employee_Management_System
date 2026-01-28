<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Employee Management System - @yield('title')</title>
    </head>
    <body>
        <header>
        <h1>Employee Management System</h1>
        <hr/>
        </header>

        <main class="container">
            @yield('content') <!--this is where the content of child views will be displayed-->
        </main>

        <footer>
            <p>&copy; 2026 Employee System</p>
        </footer>
    </body>
</html>