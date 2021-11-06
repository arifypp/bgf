@extends ('Backend.layouts.main')
@section('title') Dashboard @endsection
  @section('body')
          <!-- Welcome Toast -->
          <div class="toast toast-autohide custom-toast-1 toast-success home-page-toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="7000" data-bs-autohide="true">
            <div class="toast-body">
              <svg class="bi bi-bookmark-check text-white" width="30" height="30" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"></path>
                <path fill-rule="evenodd" d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"></path>
              </svg>
              <div class="toast-text ms-3 me-2">
                <p class="mb-1 text-white">Welcome to Affan!</p><small class="d-block">Click the "Add to Home Screen" button &amp; enjoy it like an app.</small>
              </div>
            </div>
            <button class="btn btn-close btn-close-white position-absolute p-1" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
          <!--==== Body content ====-->
          <div class="pt-3"></div>
          <div class="container">
            <div class="row g-3">
            <div class="element-heading mt-3">
              <h6>Bismillah Garden Family Dashboard</h6>
            </div>
            <div class="col-12">
                <div class="card">
                  <div class="card-body direction-rtl">
                    <div class="row">
                      <div class="col-4">
                        <!-- Single Counter -->
                        <div class="single-counter-wrap text-center">
                          <h4 class="mb-0"><span class="counter">৳
                            @php 
                              $num = 9800500;
                              $units = ['', 'K', 'M', 'B', 'T'];
                                for ($i = 0; $num >= 1000; $i++) {
                                    $num /= 1000;
                                }
                                echo round($num, 1) . $units[$i];
                            @endphp
                          </span></h4><span class="solid-line"></span>
                          <p class="mb-0">Total Balance</p>
                        </div>
                      </div>
                      <div class="col-4">
                        <!-- Single Counter -->
                        <div class="single-counter-wrap text-center">
                          <h4 class="mb-0"><span class="counter"> ৳
                          @php 
                              $num = 51500;
                              $units = ['', 'K', 'M', 'B', 'T'];
                                for ($i = 0; $num >= 1000; $i++) {
                                    $num /= 1000;
                                }
                                echo round($num, 1) . $units[$i];
                            @endphp
                          </span></h4><span class="solid-line"></span>
                          <p class="mb-0">Total Cost</p>
                        </div>
                      </div>
                      <div class="col-4">
                        <!-- Single Counter -->
                        <div class="single-counter-wrap text-center">
                          <h4 class="mb-0"><span class="counter">৳
                          @php 
                              $num = 45821;
                              $units = ['', 'K', 'M', 'B', 'T'];
                                for ($i = 0; $num >= 1000; $i++) {
                                    $num /= 1000;
                                }
                                echo round($num, 1) . $units[$i];
                            @endphp
                          </span></h4><span class="solid-line"></span>
                          <p class="mb-0">Total Recieved</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
              <!-- Today earning  -->
              <div class="col-6">
                <div class="card">
                  <div class="card-body">
                    <div class="feature-card mx-auto text-center">
                        <div class="card mx-auto">
                          <h5>৳ 
                          @php 
                            $num = 50000;
                            $units = ['', 'K', 'M', 'B', 'T'];
                              for ($i = 0; $num >= 1000; $i++) {
                                  $num /= 1000;
                              }
                              echo round($num, 1) . $units[$i];
                          @endphp

                          </h5>
                        </div>
                        <p class="mb-0">Today Recieved</p>
                     </div>
                  </div>
                </div>
              </div>
              <!-- Last Week earning  -->
              <div class="col-6">
                <div class="card">
                  <div class="card-body">
                    <div class="feature-card mx-auto text-center">
                        <div class="card mx-auto">
                          <h5>৳ 
                          @php 
                            $num = 59942;
                            $units = ['', 'K', 'M', 'B', 'T'];
                              for ($i = 0; $num >= 1000; $i++) {
                                  $num /= 1000;
                              }
                              echo round($num, 1) . $units[$i];
                          @endphp
                          </h5>
                        </div>
                        <p class="mb-0">Last Week Recieved</p>
                     </div>
                  </div>
                </div>
              </div>
              <!-- Last Month earning  -->
              <div class="col-6">
                <div class="card">
                  <div class="card-body">
                    <div class="feature-card mx-auto text-center">
                        <div class="card mx-auto">
                          <h5>৳ 
                          @php 
                            $num = 65429;
                            $units = ['', 'K', 'M', 'B', 'T'];
                              for ($i = 0; $num >= 1000; $i++) {
                                  $num /= 1000;
                              }
                              echo round($num, 1) . $units[$i];
                          @endphp
                          </h5>
                        </div>
                        <p class="mb-0">Last Months Recieved</p>
                     </div>
                  </div>
                </div>
              </div>
              <!-- Last Year earning  -->
              <div class="col-6">
                <div class="card">
                  <div class="card-body">
                    <div class="feature-card mx-auto text-center">
                        <div class="card mx-auto">
                          <h5>৳ 
                          @php 
                            $num = 698712;
                            $units = ['', 'K', 'M', 'B', 'T'];
                              for ($i = 0; $num >= 1000; $i++) {
                                  $num /= 1000;
                              }
                              echo round($num, 1) . $units[$i];
                          @endphp
                          </h5>
                        </div>
                        <p class="mb-0">Last Years Recieved</p>
                     </div>
                  </div>
                </div>
              </div>
              <!-- Today Expenses  -->
              <div class="col-6">
                <div class="card">
                  <div class="card-body">
                    <div class="feature-card mx-auto text-center">
                        <div class="card mx-auto">
                          <h5>৳ 
                          @php 
                            $num = 5871;
                            $units = ['', 'K', 'M', 'B', 'T'];
                              for ($i = 0; $num >= 1000; $i++) {
                                  $num /= 1000;
                              }
                              echo round($num, 1) . $units[$i];
                          @endphp
                          </h5>
                        </div>
                        <p class="mb-0">Today Expenses</p>
                     </div>
                  </div>
                </div>
              </div>
              <!-- Last Week Expenses  -->
              <div class="col-6">
                <div class="card">
                  <div class="card-body">
                    <div class="feature-card mx-auto text-center">
                        <div class="card mx-auto">
                          <h5>৳ 
                          @php 
                            $num = 8412;
                            $units = ['', 'K', 'M', 'B', 'T'];
                              for ($i = 0; $num >= 1000; $i++) {
                                  $num /= 1000;
                              }
                              echo round($num, 1) . $units[$i];
                          @endphp
                          </h5>
                        </div>
                        <p class="mb-0">Last Week Expenses</p>
                     </div>
                  </div>
                </div>
              </div>
              <!-- Last Months Expenses  -->
              <div class="col-6">
                <div class="card">
                  <div class="card-body">
                    <div class="feature-card mx-auto text-center">
                        <div class="card mx-auto">
                          <h5>৳ 
                          @php 
                            $num = 84692;
                            $units = ['', 'K', 'M', 'B', 'T'];
                              for ($i = 0; $num >= 1000; $i++) {
                                  $num /= 1000;
                              }
                              echo round($num, 1) . $units[$i];
                          @endphp
                          </h5>
                        </div>
                        <p class="mb-0">Last Month Expenses</p>
                     </div>
                  </div>
                </div>
              </div>
              <!-- Last Year Expenses  -->
              <div class="col-6">
                <div class="card">
                  <div class="card-body">
                    <div class="feature-card mx-auto text-center">
                        <div class="card mx-auto">
                          <h5>৳ 
                          @php 
                            $num = 998712;
                            $units = ['', 'K', 'M', 'B', 'T'];
                              for ($i = 0; $num >= 1000; $i++) {
                                  $num /= 1000;
                              }
                              echo round($num, 1) . $units[$i];
                          @endphp
                          </h5>
                        </div>
                        <p class="mb-0">Last Year Expenses</p>
                     </div>
                  </div>
                </div>
              </div>
              <div class="mb-2"></div>
            </div>
          </div>
          <div class="container direction-rtl">
            <div class="card mb-3">
              <div class="card-body">
                <div class="row g-3">
                  <div class="col-4">
                    <div class="feature-card mx-auto text-center">
                      <div class="card mx-auto bg-gray"><img src="{{ asset('/assets/img/demo-img/pwa.png') }}" alt=""></div>
                      <p class="mb-0">PWA Ready</p>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="feature-card mx-auto text-center">
                      <div class="card mx-auto bg-gray"><img src="{{ asset('/assets/img/demo-img/bootstrap.png') }}" alt=""></div>
                      <p class="mb-0">Bootstrap 5</p>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="feature-card mx-auto text-center">
                      <div class="card mx-auto bg-gray"><img src="{{ asset('/assets/img/demo-img/js.png') }}" alt=""></div>
                      <p class="mb-0">Vanilla JS</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="container">
            <div class="card mb-3">
              <div class="card-body">
                <h3>Customer Review</h3>
                <div class="testimonial-slide-three-wrapper">
                  <div class="testimonial-slide3 testimonial-style3">
                    <!-- Single Testimonial Slide -->
                    <div class="single-testimonial-slide">
                      <div class="text-content"><span class="d-inline-block badge bg-warning mb-2"><i class="bi bi-star-fill me-1"></i><i class="bi bi-star-fill me-1"></i><i class="bi bi-star-fill me-1"></i><i class="bi bi-star-fill me-1"></i><i class="bi bi-star-fill"></i></span>
                        <h6 class="mb-2">The code looks clean, and the designs are excellent. I recommend.</h6><span class="d-block">Mrrickez, Themeforest</span>
                      </div>
                    </div>
                    <!-- Single Testimonial Slide -->
                    <div class="single-testimonial-slide">
                      <div class="text-content"><span class="d-inline-block badge bg-warning mb-2"><i class="bi bi-star-fill me-1"></i><i class="bi bi-star-fill me-1"></i><i class="bi bi-star-fill me-1"></i><i class="bi bi-star-fill me-1"></i><i class="bi bi-star-fill"></i></span>
                        <h6 class="mb-2">All complete, <br> great craft.</h6><span class="d-block">Mazatlumm, Themeforest</span>
                      </div>
                    </div>
                    <!-- Single Testimonial Slide -->
                    <div class="single-testimonial-slide">
                      <div class="text-content"><span class="d-inline-block badge bg-warning mb-2"><i class="bi bi-star-fill me-1"></i><i class="bi bi-star-fill me-1"></i><i class="bi bi-star-fill me-1"></i><i class="bi bi-star-fill me-1"></i><i class="bi bi-star-fill"></i></span>
                        <h6 class="mb-2">Awesome template! <br> Excellent support!</h6><span class="d-block">Vguntars, Themeforest</span>
                      </div>
                    </div>
                    <!-- Single Testimonial Slide -->
                    <div class="single-testimonial-slide">
                      <div class="text-content"><span class="d-inline-block badge bg-warning mb-2"><i class="bi bi-star-fill me-1"></i><i class="bi bi-star-fill me-1"></i><i class="bi bi-star-fill me-1"></i><i class="bi bi-star-fill me-1"></i><i class="bi bi-star-fill"></i></span>
                        <h6 class="mb-2">Nice modern design, <br> I love the product.</h6><span class="d-block">electroMEZ, Themeforest</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
         
          <div class="pb-3"></div>

  @endsection

  @section('script')
  <script src="{{ asset('/assets/js/countdown.js') }}"></script>
  @endsection