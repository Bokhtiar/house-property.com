{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    @livewireStyles

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <x-jet-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Favicons -->
    <link href="{{ asset('assets') }}/img/favicon.png" rel="icon">
    <link href="{{ asset('assets') }}/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets') }}/css/style.css" rel="stylesheet">

    @yield('css')
    <!-- =======================================================
  * Dev Name: Bokhtiar Toshar
  * Gmail: bokhtiartoshar1@gmail.com
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    @include('layouts.dashboard.header')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('layouts.dashboard.sidebare')
    <!-- End Sidebar-->

    <main id="main" class="main">
        {{ $slot }}
    </main>

    <!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('layouts.dashboard.footer')
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets') }}/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/chart.js/chart.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/echarts/echarts.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/quill/quill.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="{{ asset('assets') }}/vendor/tinymce/tinymce.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets') }}/js/main.js"></script>
    @yield('js')
</body>

</html>