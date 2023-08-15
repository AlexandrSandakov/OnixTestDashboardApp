<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookStore</title>
    @vite('resources/css/app.css')
    <!-- Add your CSS and other head content here -->
</head>

<body class="px-4">
    <header>
        <!-- Navigation menu -->
        <nav>
            @php
            $DASHBOARD_PATH = env('FILAMENT_PATH', 'admin');
            @endphp
            <div class="flex justify-between items-center py-8">
                <h1 class="text-3xl font-bold">Welcome to MyBook.app</h1>
                <a href="{{ $DASHBOARD_PATH }}">Go to Dashboard</a>
            </div>
        </nav>
    </header>

    <main>
        <!-- Page content -->
        @yield('content')
    </main>
    <hr>
    <footer>
        <!-- Footer content -->
    </footer>

    <!-- Add your JavaScript and other script tags here -->
    @livewireScripts
</body>

</html>