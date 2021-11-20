@extends ('Backend.layouts.main')
@section('title') Dashboard @endsection
  @section('body')
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
                              $TotalCash = App\Models\Backend\TotalCash::find(1);
                              $MyCash = $TotalCash->currentbalance;


                              $num = $MyCash;
                              $units = ['', 'K', 'M', 'B', 'T'];
                                for ($i = 0; $num >= 1000; $i++) {
                                    $num /= 1000;
                                }
                                echo round($num, 1) . $units[$i];
                            @endphp
                          </span></h4><span class="solid-line"></span>
                          <p class="mb-0">Current Balance</p>
                        </div>
                      </div>
                      <div class="col-4">
                        <!-- Single Counter -->
                        <div class="single-counter-wrap text-center">
                          <h4 class="mb-0"><span class="counter"> ৳
                          @php 
                          $TotalCost = App\Models\Backend\Maintenance::sum('amount');
                              $num = $TotalCost;
                              $units = ['', 'K', 'M', 'B', 'T'];
                                for ($i = 0; $num >= 1000; $i++) {
                                    $num /= 1000;
                                }
                                echo round($num, 1) . $units[$i];
                            @endphp
                          </span></h4><span class="solid-line"></span>
                          <p class="mb-0">Total Expenses</p>
                        </div>
                      </div>
                      <div class="col-4">
                        <!-- Single Counter -->
                        <div class="single-counter-wrap text-center">
                          <h4 class="mb-0"><span class="counter">৳
                          @php 
                          $Depositors = App\Models\Backend\Depositor::where('status', 1)->sum('amount');
                              $num = $Depositors;
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
                          $TotalRecieved = App\Models\Backend\Depositor::where('status', 1)->whereDay('created_at', '>=', now()->day)->sum('amount');
                            $num = $TotalRecieved;
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
                          $date = \Carbon\Carbon::today()->subDays(7);
                          $lastWeekdata = App\Models\Backend\Depositor::where('status', 1)->whereDay('created_at', '>=', $date)->sum('amount');

                            $num = $lastWeekdata;
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
                          $LmonthRecived = App\Models\Backend\Depositor::where('status', 1)->where('created_at','>=',\Carbon\Carbon::now()->subdays(30))->get(['amount','created_at']);

                            $num = $LmonthRecived->sum('amount');
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
                          $lastyear = App\Models\Backend\Depositor::where('status', 1)->whereYear('created_at', date('Y', strtotime('-1 year')))->get(['amount','created_at']);

                          $lastyeamount = $lastyear->sum('amount');
 
                            $num = $lastyeamount;
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
                          $TotalExpenses = App\Models\Backend\Maintenance::whereDay('created_at', '>=', now()->day)->sum('amount');

                            $num = $TotalExpenses;
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
                          $date = \Carbon\Carbon::today()->subDays(7);
                          $lastWeekexP = App\Models\Backend\Maintenance::whereDay('created_at', '>=', $date)->sum('amount');

                            $num = $lastWeekexP;
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
                          $LmonthRecivedEx = App\Models\Backend\Maintenance::where('created_at','>=',\Carbon\Carbon::now()->subdays(30))->get(['amount','created_at']);

                            $num = $LmonthRecivedEx->sum('amount');
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
                          $lastyear = App\Models\Backend\Maintenance::whereYear('created_at', date('Y', strtotime('-1 year')))->get(['amount','created_at']);

                          $lastyeamountEx = $lastyear->sum('amount');

                            $num = $lastyeamountEx;
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

          <div class="pb-3"></div>

  @endsection

  @section('script')
  <script src="{{ asset('/assets/js/countdown.js') }}"></script>
  @endsection