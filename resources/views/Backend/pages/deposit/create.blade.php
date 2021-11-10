@extends ('Backend.layouts.main')
@section('title') Deposit Now @endsection
  @section('body')
  <div class="page-content-wrapper py-3">
      <div class="container">
        <!-- Element Heading -->
        <div class="element-heading">
          <h6>Deposit Cash</h6>
        </div>
      </div>
      <div class="container">
        <div class="card">
          <div class="card-body">
            <form action="{{ route('deposit.store') }}" method="POST">
              @csrf
              <div class="form-group">
                <label class="form-label" for="exampleInputText">Name</label>
                <input class="form-control" type="text" name="name" value="{{ auth()->user()->name }}" readonly>
                <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                <input type="hidden" name="traxId" value="@php echo rand(0, 9999999); @endphp">
              </div>
              <div class="form-group">
                <label class="form-label" for="exampleInputText">Amount</label>
                <input class="form-control" type="number" name="amount" placeholder="Enter Amount">
                <span class="text-danger">@error('amount'){{ $message }} @enderror</span>
              </div>

              <div class="form-group">
                <label for="type" class="form-label">Payment</label>
                <select name="paymentType" class="form-control" id="select_box">
                  <option>Select payment type</option>
                  <option value="handcash">Hand Cash</option>
                  <option value="ibanking">Ibanking</option>
                  <option value="bkash">Bkash</option>
                  <option value="nagad">Nagad</option>
                  <option value="dutchbangla">Dutch Bangla</option>
                  <option value="banktransfer">Bank Transfer</option>
                </select>
                <span class="text-danger">@error('paymentType'){{ $message }} @enderror</span>
              </div>
              <!-- Ibanking -->
              <div class="hide" id="ibanking">
                <div class="form-group">
                  <label class="form-label" for="exampleInputText">Bank Name</label>
                  <input class="form-control" type="text" name="bankname" placeholder="Enter Bank Name">
                  <span class="text-danger">@error('bankname'){{ $message }} @enderror</span>
                </div>

                <div class="form-group">
                  <label class="form-label" for="exampleInputText">Reference No / Check No</label>
                  <input class="form-control" type="text" name="checkNo" placeholder="Enter Here">
                  <span class="text-danger">@error('checkNo'){{ $message }} @enderror</span>
                </div>
              </div>
              <!-- Bkash Payment -->
              <div class="hide" id="bkash">
                <div class="form-group">
                  <label class="form-label" for="exampleInputText">Bkash Number</label>
                  <input class="form-control" type="text" name="mobileNo" placeholder="Enter Number">
                  <span class="text-danger">@error('mobileNo'){{ $message }} @enderror</span>
                </div>

                <div class="form-group">
                  <label class="form-label" for="exampleInputText">Bkash TraXID</label>
                  <input class="form-control" type="text" name="mobileTrx" placeholder="Enter TraxID">
                  <span class="text-danger">@error('mobileTrx'){{ $message }} @enderror</span>
                </div>
              </div>
               <!-- Nagad Payment -->
               <div class="hide" id="nagad">
                <div class="form-group">
                  <label class="form-label" for="exampleInputText">Nagad Number</label>
                  <input class="form-control" type="text" name="mobileNo" placeholder="Enter Number">
                  <span class="text-danger">@error('mobileNo'){{ $message }} @enderror</span>
                </div>

                <div class="form-group">
                  <label class="form-label" for="exampleInputText">Nagad TraXID</label>
                  <input class="form-control" type="text" name="mobileTrx" placeholder="Enter TraxID">
                  <span class="text-danger">@error('mobileTrx'){{ $message }} @enderror</span>
                </div>
              </div>
              <!-- Dutch Bangla Payment -->
              <div class="hide" id="dutchbangla">
                <div class="form-group">
                  <label class="form-label" for="exampleInputText">Dutch Bangla Number</label>
                  <input class="form-control" type="text" name="mobileNo" placeholder="Enter Number">
                  <span class="text-danger">@error('mobileNo'){{ $message }} @enderror</span>
                </div>

                <div class="form-group">
                  <label class="form-label" for="exampleInputText">Dutch Bangla TraXID</label>
                  <input class="form-control" type="text" name="mobileTrx" placeholder="Enter TraxID">
                  <span class="text-danger">@error('mobileTrx'){{ $message }} @enderror</span>
                </div>
              </div>
              <!-- Bank Transfer Payment -->
              <div class="hide" id="banktransfer">
                <div class="form-group">
                  <label class="form-label" for="exampleInputText">Bank Number</label>
                  <input class="form-control" type="text" name="bankname" placeholder="Enter Bank Name">
                  <span class="text-danger">@error('bankname'){{ $message }} @enderror</span>
                </div>

                <div class="form-group">
                  <label class="form-label" for="exampleInputText">Bank Account</label>
                  <input class="form-control" type="text" name="bankAcc" placeholder="Enter Account No">
                  <span class="text-danger">@error('bankAcc'){{ $message }} @enderror</span>
                </div>
              </div>
              
                        
              <button class="btn btn-primary w-100 d-flex align-items-center justify-content-center" type="submit">Deposit
                <svg class="bi bi-arrow-right-short" width="24" height="24" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path>
                </svg>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  @endsection

  @section('script')
  <script>
    $(document).ready(function(){
      $('#select_box').change(function () {
          var select=$(this).find(':selected').val();        
          $(".hide").hide();
          $('#' + select).show();

      }).change();

    })

  </script>


  @endsection