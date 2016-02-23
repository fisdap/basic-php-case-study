<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Task Manager</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/dist/bundle.min.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    @include('partials.navigation')
    @yield('content')
    <script src="/dist/bundle.min.js" charset="utf-8"></script>
  </body>
</html>
