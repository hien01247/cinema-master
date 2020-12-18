<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BK CINEMA</title>
  <base href="{{asset('')}}">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="sources/css/style.css">
</head>

<body>
  <div id="all">

    @include('topbar')

    @include('menubar')

    @include('flash-message')
    
    @yield('content')

    @include('footer')

    
  </div>
  <!-- Javascript files-->
  <script src="sources/js/front.js"></script>
  <!-- Button back-to-top -->
  <script type="text/javascript">
    $(document).ready (function (){
      $(window).scroll(function () {
        if ($(this).scrollTop() > 100) $('#goTop').fadeIn();
        else $('#goTop').fadeOut();
      });
      $('#goTop').click(function () {
        $('body,html').animate({scrollTop: 0}, 'slow');
      });
    });
  
  </script>

  
</body>

</html>