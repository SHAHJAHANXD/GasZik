<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    @include('admin.layouts.heads')

    @yield('extra_heads')

</head>

<body>

    @include('admin.layouts.sidebar')

    <section class="main_content dashboard_part large_header_bg">

        @include('admin.layouts.header')

        @yield('content')

        @include('admin.layouts.footer')

    </section>

    @include('admin.layouts.scripts')

    @yield('extra_scripts')

</body>

</html>
