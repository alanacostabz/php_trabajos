<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
  
  <title>{{config('app.name', 'LARAVELAPP')}}</title>

</head>

<body class="d-flex flex-column min-vh-100">
  @include('inc.navbar')
  <div class="container">
    @include('inc.messages')
    @yield('content')
  </div>
  @include('inc.footer');
  
</body>

</html>