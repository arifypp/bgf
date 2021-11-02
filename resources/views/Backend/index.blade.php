<!DOCTYPE html>
<html id="previewPage" lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="BGF - Online Building Management System">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#0134d4">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Title -->
    <title>BGF - Online Building Management System</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('/assets/img/core-img/favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('/assets/img/icons/icon-96x96.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('/assets/img/icons/icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="167x167" href="{{ asset('/assets/img/icons/icon-167x167.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/assets/img/icons/icon-180x180.png') }}">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/tiny-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/baguetteBox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/rangeslider.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/vanilla-dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/apexcharts.css') }}">
    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{ asset('/assets/style.css') }}">
    <!-- Web App Manifest -->
    <link rel="manifest" href="{{ asset('/assets/manifest.json') }}">

  </head>
  <body>
    <!-- Preloader -->
    <div id="preloader">
      <div class="spinner-grow text-primary" role="status"><span class="visually-hidden">Loading...</span></div>
    </div>
    <!-- Internet Connection Status -->
    <!-- # This code for showing internet connection status -->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Hero Block Wrapper -->
    <div class="hero-block-wrapper bg-primary">
      <!-- Styles -->
      <div class="hero-block-styles">
        <div class="hb-styles1" style="background-image: url('img/core-img/dot.png')"></div>
        <div class="hb-styles2"></div>
        <div class="hb-styles3"></div>
      </div>
      <div class="custom-container">
        <!-- Skip Page -->
        <div class="skip-page"><a href="{{ route('login') }}">Skip</a></div>
        <!-- Hero Block Content -->
        <div class="hero-block-content"><img class="mb-4" src="https://designing-world.com/affan-1.4.0/img/bg-img/19.png" alt="">
          <h2 class="display-4 text-white mb-3">Build your house easier with BGF</h2>
          <p class="text-white">BGF is a modern and latest house builder company.</p><a class="btn btn-warning btn-lg w-100" href="{{ route('login') }}">Get Started</a>
        </div>
      </div>
    </div>


      <script>
        var tag = document.createElement('script');
        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
        
        var closeButtom = document.getElementById("popupVideoBtnClose");
        var player;
        function onYouTubeIframeAPIReady() {
            player = new YT.Player("homePagePopupVideo", {
            videoId: '-D6QFpH7zCA',
                events: {
                    'onReady': onPlayerReady,
                }
            });
        }
        
        function onPlayerReady(event) {
            closeButtom.addEventListener("click", function () {
                player.stopVideo();
            });
        }
        
      </script>

    <!-- All JavaScript Files -->
    <script src="{{ asset('/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/assets/js/slideToggle.min.js') }}"></script>
    <script src="{{ asset('/assets/js/internet-status.js') }}"></script>
    <script src="{{ asset('/assets/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('/assets/js/baguetteBox.min.js') }}"></script>
    <script src="{{ asset('/assets/js/countdown.js') }}"></script>
    <script src="{{ asset('/assets/js/rangeslider.min.js') }}"></script>
    <script src="{{ asset('/assets/js/vanilla-dataTables.min.js') }}"></script>
    <script src="{{ asset('/assets/js/index.js') }}"></script>
    <script src="{{ asset('/assets/js/magic-grid.min.js') }}"></script>
    <script src="{{ asset('/assets/js/dark-rtl.js') }}"></script>
    <script src="{{ asset('/assets/js/active.js') }}"></script>
    <!-- PWA -->
    <script src="{{ asset('/assets/js/pwa.js') }}"></script>
  </body>
</html>