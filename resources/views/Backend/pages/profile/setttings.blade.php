
@extends ('Backend.layouts.main')
@section('title') Profile Settings @endsection
  @section('body')
  <div class="dark-mode-switching">
      <div class="d-flex w-100 h-100 align-items-center justify-content-center">
        <div class="dark-mode-text text-center">
          <svg class="bi bi-moon" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M14.53 10.53a7 7 0 0 1-9.058-9.058A7.003 7.003 0 0 0 8 15a7.002 7.002 0 0 0 6.53-4.47z"></path>
          </svg>
          <p class="mb-0">Switching to dark mode</p>
        </div>
        <div class="light-mode-text text-center">
          <svg class="bi bi-brightness-high" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"></path>
          </svg>
          <p class="mb-0">Switching to light mode</p>
        </div>
      </div>
    </div>
    <!-- RTL mode switching -->
    <div class="rtl-mode-switching">
      <div class="d-flex w-100 h-100 align-items-center justify-content-center">
        <div class="rtl-mode-text text-center">
          <svg class="bi bi-text-right" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-4-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm4-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-4-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"></path>
          </svg>
          <p class="mb-0">Switching to RTL mode</p>
        </div>
        <div class="ltr-mode-text text-center">
          <svg class="bi bi-text-left" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"></path>
          </svg>
          <p class="mb-0">Switching to default mode</p>
        </div>
      </div>
    </div>
    <div class="page-content-wrapper py-3">
      <div class="container">
        <!-- Setting Card-->
        <div class="card mb-3 shadow-sm">
          <div class="card-body direction-rtl">
            <p>Settings</p>
            <div class="single-setting-panel">
              <div class="form-check form-switch mb-2">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked>
                <label class="form-check-label" for="flexSwitchCheckDefault">Availability Status</label>
              </div>
            </div>
            <div class="single-setting-panel">
              <div class="form-check form-switch mb-2">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault2" checked>
                <label class="form-check-label" for="flexSwitchCheckDefault2">Send Me Notifications</label>
              </div>
            </div>
            <div class="single-setting-panel">
              <div class="form-check form-switch mb-2">
                <input class="form-check-input" type="checkbox" id="darkSwitch">
                <label class="form-check-label" for="darkSwitch">Dark Mode</label>
              </div>
            </div>
            <div class="single-setting-panel">
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="rtlSwitch">
                <label class="form-check-label" for="rtlSwitch">RTL Mode</label>
              </div>
            </div>
          </div>
        </div>
        <!-- Setting Card-->
        <div class="card mb-3 shadow-sm">
          <div class="card-body direction-rtl">
            <p>Account</p>
            <div class="single-setting-panel"><a href="{{ route('settings.myprofile', $users->id) }}">
                <div class="icon-wrapper"><i class="bi bi-person"></i></div>Update Profile</a></div>
            <div class="single-setting-panel"><a href="{{ route('settings.password', $users->id) }}">
                <div class="icon-wrapper bg-info"><i class="bi bi-lock"></i></div>Change Password</a></div>
          </div>
        </div>
        <!-- Setting Card-->
        <div class="card shadow-sm">
          <div class="card-body direction-rtl">
            <p>Logout</p>
            <div class="single-setting-panel">
                <a href="javascript:void();" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <div class="icon-wrapper bg-danger"><i class="bi bi-box-arrow-right"></i></div>Logout
                </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  @endsection
