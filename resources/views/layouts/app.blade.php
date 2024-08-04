{{-- <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    @stack('styles')
</head>
<body>
    <div id="app">
        @include('layouts.navigation')

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>
</html> --}}
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons (e.g., Font Awesome) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    @stack('styles')
</head>
<body>
    <div id="app" class="d-flex flex-column min-vh-100">
       @include('layouts.navigation')

        <div class="d-flex flex-grow-1">
            <!-- Sidebar -->
            @include('layouts.sidebar')        
            
            <div id="page-content-wrapper" class="flex-grow-1">
                <main class="py-4">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>

    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#sidebar").toggleClass("toggled");
        });
    </script>
    
    <style>
        .d-flex {
            display: flex;
        }
    
        #sidebar {
            width: 250px;
            transition: all 0.3s;
        }
    
        #sidebar.toggled {
            margin-left: -250px;
        }
    
        #page-content-wrapper {
            flex-grow: 1;
            padding: 20px;
        }
    
        @media (max-width: 768px) {
            #sidebar {
                margin-left: -250px;
            }
            #sidebar.toggled {
                margin-left: 0;
            }
        }
    
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
    
        #app {
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }
    
        .navbar, .d-flex.flex-grow-1 {
            flex-shrink: 0;
        }
    
        .sidebar-item {
            margin-bottom: 10px;
        }
    
        .sub-menu-item {
            margin-left: 30px;
        }
    
        /* Custom styles for sidebar */
        .sidebar-custom {
            box-shadow: 2px 0px 10px rgba(0, 0, 0, 0.15);
            background: linear-gradient(to bottom, #ffffff, #f8f9fa);
        }
    
        /* Common styles for sidebar items */
        .sidebar-item-custom, .sub-menu-item-custom {
            border-radius: 0;
            padding: 10px 15px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease, transform 0.2s;
        }
    
        .sidebar-item-custom:hover, .sub-menu-item-custom:hover {
            background-color: #e9ecef;
            transform: scale(1.05);
        }
    
        /* Icon styles */
        .icon-custom, .sub-menu-icon {
            font-size: 1.2em;
            color: #007bff;
            margin-right: 10px;
            transition: transform 0.2s;
        }
    
        .sidebar-item-custom:hover .icon-custom, .sub-menu-item-custom:hover .sub-menu-icon {
            transform: rotate(15deg);
        }
    
        .sub-menu-icon {
            font-size: 1em;
        }
    
        /* Active state */
        .list-group-item-action.active {
            background-color: #007bff;
            color: white;
            border: none;
        }

        
    </style>
    

    @stack('scripts')
</body>
</html>
