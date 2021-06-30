<!DOCTYPE html>
<html lang="en">
    <head>

		@include('customer.layouts.head')

    </head>
    <body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
        @include('customer.layouts.header')

        @include('customer.layouts.sidebar')

        @yield('content')

        @include('customer.layouts.footer')

        @include('customer.layouts.scripts')
    </body>
</html>