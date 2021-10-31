<!DOCTYPE html>
<html lang="en">
  <head>
  <!--==== Header basic ====-->
    @include('Backend.includes.header')
  <!--==== Header css Libraries ====-->
    @include('Backend.includes.css')
  </head>
  <body>
  <!--==== Pre loader====-->
    @include('Backend.includes.preloader')
    <!-- Internet Connection Status -->
    <!-- # This code for showing internet connection status -->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Header Area -->
    @include('Backend.includes.topbar')
  <!--==== Offcanvas Menu ====-->
  @include('Backend.includes.menubar')
    <div class="page-content-wrapper">
      <!--==== Body Content ====-->
        @yield('body')
      <!--==== Body Content ====-->
    </div>
  <!--==== Footer Menu ====-->
  @include('Backend.includes.footer')  

  <!--==== All JavaScript Files ====-->
  @include('Backend.includes.scripts')

  </body>
</html>