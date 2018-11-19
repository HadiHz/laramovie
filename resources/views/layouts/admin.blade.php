<!doctype html>
<html lang="fa">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/vazir.css">
    <link rel="stylesheet" href="/css/themify-icons.css">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/DateTimePicker.css" />
    <title>Hello, world!</title>
</head>
<body>
@include('admin.partials.header_admin_panel')

<div class="main-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-2 pl-0 bg-dark text-center text-light pr-0">
                @include('admin.partials.menu_admin_panel')
            </div>
            <div class="col-12 col-md-10 bg-light pt-3">
                @yield('content')
            </div>
        </div>
    </div>
</div>


<script src="/js/jquery.min.js"></script>
<script src="/js/select2.min.js"></script>
<script src="/js/custom-admin.js"></script>
<script src="/js/nav.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/DateTimePicker.js"></script>
</body>
</html>