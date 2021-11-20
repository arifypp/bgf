    <!-- Offcanvas -->
    <div class="offcanvas offcanvas-start" id="affanOffcanvas" data-bs-scroll="true" tabindex="-1" aria-labelledby="affanOffcanvsLabel">
      <button class="btn-close btn-close-white text-reset" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      <div class="offcanvas-body p-0">
        <!-- Side Nav Wrapper -->
        <div class="sidenav-wrapper">
          <!-- Sidenav Profile -->
          <div class="sidenav-profile bg-gradient">
            <div class="sidenav-style1"></div>
            <!-- User Thumbnail -->
            <div class="user-profile"><img src="{{ asset('/'. auth()->user()->avatar) }}" alt=""></div>
            <!-- User Info -->
            <div class="user-info">
              <h6 class="user-name mb-0">{{ Auth::user()->name }}</h6>
              <span>
              @foreach( App\Models\Backend\Flatowner::where('userID', auth()->user()->id )->get() as $value )
                    You're owned of {{ $value->unit->unitname }}
                  @endforeach
              </span>
            </div>
          </div>
          <!-- Sidenav Nav -->
          <ul class="sidenav-nav ps-0">
            <li><a href="{{ route('homepage') }}"><i class="bi bi-house-door"></i>Home</a></li>
          @if(Auth::user()->is_super == 1)
          <li><a href="{{ route('floor.manage') }}" class="@if(Route::currentRouteNamed('floor.manage')) active @endif"><i class="bi bi-building"></i>My Floor</a></li>
          @else
           <!-- Floor Information -->
           <li><a href="#" class="nav-url @if( Route::currentRouteNamed('floor.manage') || Route::currentRouteNamed('floor.edit') || Route::currentRouteNamed('floor.create') ) dd-open @endif"><i class="bi bi-building"></i>Floor Information</a>
              <!-- Sub Item -->
              <ul>
                <li><a href="{{ route('floor.manage') }}" class="@if(Route::currentRouteNamed('floor.manage')) active @endif">Manage Floor</a></li>
                <li><a href="{{ route('floor.create') }}">Add New Floor</a></li>
              </ul>
          </li>
          @endif

          @if(Auth::user()->is_super == 1)
          <li><a href="{{ route('unit.manage') }}" class=" @if( Route::currentRouteNamed('unit.manage') ) active @endif"><i class="bi bi-box"></i>My Unit</a></li>
          @else
          <!-- Unit Information -->
          <li><a href="#" class="nav-url @if( Route::currentRouteNamed('unit.manage') ) dd-open @endif"><i class="bi bi-box"></i>Unit Information</a>
              <!-- Sub Item -->
              <ul>
                <li><a href="{{ route('unit.manage') }}">Manage Unit</a></li>
                <li><a href="{{ route('unit.create') }}">Add New Unit</a></li>
              </ul>
          </li>
          @endif
          @if(Auth::user()->is_super == 0)
          <!-- Owner Information  -->
          <li><a href="#" class="nav-url @if( Route::currentRouteNamed('ownerlist.manage') || Route::currentRouteNamed('ownerlist.edit') || Route::currentRouteNamed('ownerlist.create') ) dd-open @endif"><i class="bi bi-people"></i>Owner Information</a>
              <!-- Sub Item -->
              <ul>
                <li><a href="{{ route('ownerlist.manage') }}">Owner Manage</a></li>
                <li><a href="{{ route('ownerlist.create') }}">Add New Owner</a></li>
              </ul>
          </li>
          <!-- Maintenance Cost -->
          <li><a href="#" class="nav-url @if( Route::currentRouteNamed('maintenance.manage') || Route::currentRouteNamed('maintenance.edit') || Route::currentRouteNamed('maintenance.create') ) dd-open @endif"><i class="bi bi-scissors"></i>Maintenance Cost</a>
              <!-- Sub Item -->
              <ul>
                <li><a href="{{ route('maintenance.manage') }}">Manage Cost</a></li>
                <li><a href="{{ route('maintenance.create') }}">Add Cost</a></li>
              </ul>
          </li>
          <!-- Notification System -->
          <li><a href="#" class="nav-url @if( Route::currentRouteNamed('notification.manage') || Route::currentRouteNamed('notification.edit') || Route::currentRouteNamed('notification.create') ) dd-open @endif"><i class="bi bi-bell"></i>Manage Notificaiton</a>
              <!-- Sub Item -->
              <ul>
                <li><a href="{{ route('notification.manage') }}">Manage Notification</a></li>
                <li><a href="{{ route('notification.create') }}">Add Notificaiton</a></li>
              </ul>
          </li>
          
          <!-- Deposit List -->
          <li><a href="#" class="nav-url @if( Route::currentRouteNamed('deposit.manage') || Route::currentRouteNamed('deposit.edit') || Route::currentRouteNamed('deposit.create') ) dd-open @endif"><i class="bi bi-card-checklist"></i>Manage Deposit</a>
              <!-- Sub Item -->
              <ul>
                <li><a href="{{ route('deposit.manage') }}">Deposit List</a></li>
              </ul>
          </li>
          @endif

          <li><a href="{{ route('totalcash.manage') }}"><i class="bi bi-currency-dollar"></i>Total Amount</a></li>

            <li>
              <div class="night-mode-nav"><i class="bi bi-moon"></i>Night Mode
                <div class="form-check form-switch">
                  <input class="form-check-input form-check-success" id="darkSwitch" type="checkbox">
                </div>
              </div>
            </li>
            <li>
              <a href="javascript:void();" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bi bi-box-arrow-right"></i>Logout</span></a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            
            </li>
          </ul>
          <!-- Social Info -->
          <div class="social-info-wrap"><a href="#"><i class="bi bi-facebook"></i></a><a href="#"><i class="bi bi-twitter"></i></a><a href="#"><i class="bi bi-linkedin"></i></a></div>
          <!-- Copyright Info -->
          <div class="copyright-info">
            <p>2021 &copy; Made by<a href="https://happyarif.com">Happy Arif</a></p>
          </div>
        </div>
      </div>
    </div>