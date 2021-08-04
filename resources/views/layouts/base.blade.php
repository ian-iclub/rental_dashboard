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

                <!-- Breadcrumb section  -->
                <div class="page-breadcrumb">
                    <div class="row">
                        <div class="col-7 align-self-center">
                            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Basic Table</h4>
                            <div class="d-flex align-items-center">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb m-0 p-0">
                                        <li class="breadcrumb-item"><a href="index.html" class="text-muted">Home</a></li>
                                        <li class="breadcrumb-item text-muted active" aria-current="page">Library</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <div class="col-5 align-self-center">
                            <div class="customize-input float-right">
                                <select class="custom-select custom-select-set form-control bg-white border-0 custom-shadow custom-radius">
                                    <option selected>Aug 19</option>
                                    <option value="1">July 19</option>
                                    <option value="2">Jun 19</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

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
