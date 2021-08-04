<!DOCTYPE html>
<html dir="ltr">

    <head>

        @include('includes.head')

        <!-- Title -->
        <title>@yield('title')</title>

    </head>

    <body>
        <div class="main-wrapper">

            @include('includes.preloader')

            @include('includes.flash')

            @yield('content')

        </div>

        @include('includes.auth.scripts')
    </body>

</html>
