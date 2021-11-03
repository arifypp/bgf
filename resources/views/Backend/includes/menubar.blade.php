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
            <div class="user-profile"><img src="{{ asset('/assets/img/bg-img/2.jpg') }}" alt=""></div>
            <!-- User Info -->
            <div class="user-info">
              <h6 class="user-name mb-0">{{ Auth::user()->name }}</h6>
              @if(Auth::user()->is_super == 0)
              <span>CEO, Bismillah Garden Family</span>
              @elseif(Auth::user()->is_super == 1)
              <span>Flat Owner</span>
              @endif
            </div>
          </div>
          <!-- Sidenav Nav -->
          <ul class="sidenav-nav ps-0">
            <li><a href="{{ route('homepage') }}"><i class="bi bi-house-door"></i>Home</a></li>
            <!-- Floor Information -->
            <li><a href="#" class="nav-url @if( Route::currentRouteNamed('floor.manage') || Route::currentRouteNamed('floor.edit') || Route::currentRouteNamed('floor.create') ) dd-open @endif"><i class="bi bi-building"></i>Floor Information</a>
              <!-- Sub Item -->
              <ul>
                <li><a href="{{ route('floor.manage') }}" class="@if(Route::currentRouteNamed('floor.manage')) active @endif">Manage Floor</a></li>
                <li><a href="{{ route('floor.create') }}">Add New Floor</a></li>
              </ul>
          </li>
          <!-- Unit Information -->
          <li><a href="#" class="nav-url @if( Route::currentRouteNamed('unit.manage') || Route::currentRouteNamed('unit.edit') || Route::currentRouteNamed('unit.create') ) dd-open @endif"><i class="bi bi-box"></i>Unit Information</a>
              <!-- Sub Item -->
              <ul>
                <li><a href="{{ route('unit.manage') }}">Manage Unit</a></li>
                <li><a href="{{ route('unit.create') }}">Add New Unit</a></li>
              </ul>
          </li>
          <!-- Owner Information  -->
          <li><a href="#" class="nav-url @if( Route::currentRouteNamed('ownerlist.manage') || Route::currentRouteNamed('ownerlist.edit') || Route::currentRouteNamed('ownerlist.create') ) dd-open @endif"><i class="bi bi-people"></i>Owner Information</a>
              <!-- Sub Item -->
              <ul>
                <li><a href="{{ route('ownerlist.manage') }}">Owner Manage</a></li>
                <li><a href="{{ route('ownerlist.create') }}">Add New Owner</a></li>
              </ul>
          </li>
          
            <li><a href="elements.html"><i class="bi bi-folder2-open"></i>Elements<span class="badge bg-danger rounded-pill ms-2">220+</span></a></li>
            <li><a href="pages.html"><i class="bi bi-collection"></i>Pages<span class="badge bg-success rounded-pill ms-2">100+</span></a></li>
            <li><a href="#"><i class="bi bi-cart-check"></i>Shop</a>
              <ul>
                <li><a href="page-shop-grid.html">Shop Grid</a></li>
                <li><a href="page-shop-list.html">Shop List</a></li>
                <li><a href="page-shop-details.html">Shop Details</a></li>
                <li><a href="page-cart.html">Cart</a></li>
                <li><a href="page-checkout.html">Checkout</a></li>
              </ul>
            </li>
            <li><a href="settings.html"><i class="bi bi-gear"></i>Settings</a></li>
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