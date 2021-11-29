<!DOCTYPE html>
<html lang="en">
<head>
  <title>Test Assessment</title>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  @yield('common_css')

</head>

<body>
  
<div class="container">
    @yield('content')
</div>

@yield('common_js')
<script type="text/javascript">
    var url = "{{ URL::to('/'); }}";
</script>
<script src="{{ asset('js/user.js') }}"></script>


</body>
</html>
