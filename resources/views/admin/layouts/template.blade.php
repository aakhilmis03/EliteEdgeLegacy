<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>

    <meta charset="utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Elite Edge Legacy Admin Panel</title>

    <link href="{{url('admin_assets')}}/images/favicon.ico" rel="shortcut icon" />

    <meta name="_token" content="{!! csrf_token() !!}" />

    @include('admin.layouts.css')

    <style>

  .fl-wrapper {

    z-index: 99999 !important;

}

.fl-flasher {

    border: 2px solid #ddd !important;

    border-radius: 5px;

}

</style>

</head>





<body class="navbar-fixed sidebar-fixed" id="body">

    <script>

        NProgress.configure({

            showSpinner: false

        });

        NProgress.start();

    </script>

    <!-- main wrapper div -->

    <div class="wrapper">

        <!-- start sidebar -->

        @include('admin.layouts.sidebar')

        <!-- end sidebar -->

        <!-- page wrapper -->

        <div class="page-wrapper">

        <!-- start header -->

        @include('admin.layouts.header')

        <!-- end header -->         

        <div class="content-wrapper">

            <div class="content">

                 @yield('content')

            </div>

        </div>

        <!-- start footer -->

        @include('admin.layouts.footer')

        <!-- end footer -->

        </div>

    </div>

    @include('admin.layouts.js')

</body>



</html>