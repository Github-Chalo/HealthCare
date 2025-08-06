<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('images/logo.svg') }}">
    <title>
        @yield('title')
    </title>

    {{-- External Styles & Scripts --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.js"></script>

    <style>
        /* Arduino status card styling (fixed at top right) */
        .arduino-status-card {
            position: fixed;
            top: 80px; /* Adjust based on navbar height */
            right: 20px;
            z-index: 9999;
        }

        .status-box {
            padding: 10px 20px;
            border-radius: 12px;
            color: white;
            font-size: 14px;
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
        }

        .status-box.online {
            background-color: #16a34a; /* Green */
        }

        .status-box.offline {
            background-color: #dc2626; /* Red */
        }
    </style>
</head>
<body>

    {{-- Navbar --}}
    @include('user.layouts.header')

    {{-- Fixed Arduino Status Card --}}
    <div class="arduino-status-card">
        <div class="status-box {{ arduinoStatus() === 'Online' ? 'online' : 'offline' }}">
            <strong>Arduino Status:</strong> {{ arduinoStatus() }}
        </div>
    </div>

    {{-- Main Content --}}
    @yield('content')

    {{-- Alert Component --}}
    <x-alert />

</body>
</html>
