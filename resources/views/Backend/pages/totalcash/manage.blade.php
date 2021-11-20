@extends ('Backend.layouts.main')
@section('title') Total Balance @endsection
  @section('body')
          <!--==== Body content ====-->
          <div class="pt-3"></div>
          <div class="container">
            <div class="row g-3">
            <div class="element-heading mt-3">
              <h6>Total Amount</h6>
            </div>
            <div class="col-12">
                <div class="card">
                  <div class="card-body direction-rtl">
                    <div class="row">
                      <div class="col-12">
                        <!-- Single Counter -->
                        <div class="single-counter-wrap text-center">
                          <h4 class="mb-0"><span class="counter">৳
                          
                            @php 
                              $TotalCash = App\Models\Backend\TotalCash::find(1);
                              $MyCash = $TotalCash->totalamount;


                              $num = $MyCash;
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
                   </div>
                <div class="mb-2"></div>
                </div>
            </div>
         
          <div class="pb-3"></div>

  @endsection

  @section('script')
  <script src="{{ asset('/assets/js/countdown.js') }}"></script>
  @endsection