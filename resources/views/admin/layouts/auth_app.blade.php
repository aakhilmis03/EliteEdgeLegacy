<!DOCTYPE html>
<html lang="en">
<head>
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Autobest Admin Panel</title>
  <link href="{{ url('admin_assets')}}/images/favicon.ico" rel="shortcut icon" />
  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
  <link href="{{ url('admin_assets')}}/plugins/material/css/materialdesignicons.min.css" rel="stylesheet" />
  <link href="{{ url('admin_assets')}}/plugins/simplebar/simplebar.css" rel="stylesheet" />

  <!-- PLUGINS CSS STYLE -->
  <link href="{{ url('admin_assets')}}/plugins/nprogress/nprogress.css" rel="stylesheet" />
  
  <!-- Autobest CSS -->
  <link id="main-css-href" rel="stylesheet" href="{{ url('admin_assets')}}/css/style.css" />
  <!-- FAVICON -->
 
  <script src="{{ url('admin_assets')}}/plugins/nprogress/nprogress.js"></script>
</head>

</head>
<body class="bg-light-gray" id="body">
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh">
        @yield('content')
    </div>
</body>
</html>
