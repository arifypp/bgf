@extends('Backend.layouts.account')

@section('body')
    <!-- Wrapper -->
    <div class="login-wrapper d-flex align-items-center justify-content-center text-center">
      <div class="custom-container">
        <div class="text-center px-4"><img class="login-intro-img mb-4" src="https://designing-world.com/affan-1.4.0/img/bg-img/38.png" alt="">
          <h3>Check your mailbox!</h3>
          <p class="mb-4">We have sent a password recovery email in your email. This email contain 8 digit security code.</p>
            <div class="alert alert-success" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="btn btn-primary">{{ __('Send Again') }}</button>.
            </form>
            <br>
            <a href="javascript:void();" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="mt-2 btn btn-danger">Logout</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
        </div>
      </div>
    </div>

<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
