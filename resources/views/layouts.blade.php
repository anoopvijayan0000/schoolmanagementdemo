<!doctype html>
<html>
<head>
   @include('head')
</head>
<body>
<div class="container">
   <header class="row">
       @include('menu')
   </header>
   <div id="main" class="row" style="padding-left: 50px;padding-top: 10px;">
           @yield('content')
   </div>
   <footer class="row">
    
   </footer>
</div>
</body>
</html>