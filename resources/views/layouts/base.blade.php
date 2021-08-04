<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

        @include('includes.head')

        <!-- Title -->
        <title>@yield('title')</title>

    </head>

    <body class="font-sans antialiased">

        @include('includes.preloader')

        @include('includes.flash')

        <!-- Main wrapper - Style in pages.scss  -->
        <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
             data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">

            @include('includes.header')

            @include('includes.sidebar')

            <div class="page-wrapper">

                @include('includes.breadcrumb')

                <!-- Content section  -->
                <div class="container-fluid">
                    @yield('content')
                </div>

                @include('includes.footer')

            </div>

        </div>

        @include('includes.scripts')

    </body>


</html>
