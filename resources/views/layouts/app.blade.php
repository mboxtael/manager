<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Laravel Quickstart - Basic</title>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
        <script src="https://cdn.socket.io/socket.io-1.4.5.js"></script>
        <script type="text/javascript">
          var socket = io('localhost:3000');
        </script>
        <!-- CSS And JavaScript -->
    </head>

    <body>
        <div class="container">
            <nav class="navbar navbar-default">
                <!-- Navbar Contents -->
            </nav>
        </div>

        @yield('content')
    </body>
</html>
