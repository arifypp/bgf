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

      <!--=== Main Content ==-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Back Button -->
      <div class="login-back-button"><a href="{{ route('appstart') }}">
        <svg class="bi bi-arrow-left-short" width="32" height="32" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"></path>
        </svg></a>
      </div>
      <!-- Login Wrapper Area -->
        <div class="login-wrapper d-flex align-items-center justify-content-center">
          @yield('body')
        </div>

      <!--==== All JavaScript Files ====-->
      @include('Backend.includes.scripts')
  </body>
</html>