<!DOCTYPE html>
<html>
<head>
  <title>PHP Skills Test</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="{!! asset('bootstrap/css/bootstrap.min.css') !!}">
  <script src="{!! asset('js/jquery-1.12.4.min.js') !!}"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{url('/')}}">Home</a>
    </div>
  </div>
</nav>
@yield('content')
@yield('js')
</body>
</html>