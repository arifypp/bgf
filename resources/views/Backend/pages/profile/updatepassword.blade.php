@extends ('Backend.layouts.main')
@section('title') Update Password @endsection
  @section('body')
  <div class="login-wrapper d-flex align-items-center justify-content-center">
      <div class="custom-container">
        <div class="text-center px-4"><img class="login-intro-img" src="https://designing-world.com/affan-1.4.0/img/bg-img/36.png" alt=""></div>
        <!-- Change Password Form -->
        <div class="register-form mt-4">
          <form id="change-password" action="{{ route('settings.Updatepassword', $users->id) }}" method="post">
              @csrf
            <div class="form-group text-start mb-3">
              <input class="form-control" name="current_password" type="password" placeholder="Enter Current Password">
            </div>
            <span class="text-danger">@error('current_password'){{ $message }} @enderror</span>
            <div class="form-group text-start mb-3 position-relative">
              <input class="form-control" id="psw-input" name="password" type="password" placeholder="New password">
              <div class="position-absolute" id="password-visibility"><i class="bi bi-eye"></i><i class="bi bi-eye-slash"></i></div>
              <span class="text-danger">@error('password'){{ $message }} @enderror</span>
            </div>
            <div class="mb-3 password-strength-meter" id="pswmeter" style="display: none;"><div class="password-strength-meter-score"></div></div>
            <div class="form-group text-start mb-3">
              <input class="form-control" type="password" name="password_confirmation" placeholder="Re-write password">
            </div>
            <span class="text-danger">@error('password_confirmation'){{ $message }} @enderror</span>
            <button class="btn btn-primary w-100" type="submit">Update Password</button>
          </form>
        </div>
      </div>
    </div>
  @endsection