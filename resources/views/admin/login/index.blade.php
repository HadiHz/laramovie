<html>
<head>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/loginCSS.css">

</head>
<body class="text-center">

<form class="form-signin" method="post" action="{{ route('authenticate') }}">
    {{ csrf_field() }}
    <h1 class="h3 mb-3 font-weight-normal">Admin Login</h1>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="">
    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" name="remember"> Remember me
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
</form>

<script src="/js/jquery.min.js"></script>
<script src="/js/select2.min.js"></script>
<script src="/js/custom-admin.js"></script>
<script src="/js/nav.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/DateTimePicker.js"></script>
</body>
</html>
