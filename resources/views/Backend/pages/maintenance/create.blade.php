@extends ('Backend.layouts.main')
@section('title') Create Maintenance Cost @endsection
  @section('body')
  <div class="page-content-wrapper py-3">
      <div class="container">
        <!-- Element Heading -->
        <div class="element-heading">
          <h6>Create New Maintenance Cost</h6>
        </div>
      </div>
      <div class="container">
        <div class="card">
          <div class="card-body">
            <form action="{{ route('maintenance.store') }}" method="POST">
              @csrf
              <div class="form-group">
                <label class="form-label" for="exampleInputText">Title</label>
                <input class="form-control" type="text" name="title" placeholder="Enter Maintenance Title">
                <span class="text-danger">@error('title'){{ $message }} @enderror</span>
              </div>              

              <div class="form-group">
                <label class="form-label" for="Maintenance Date">Date</label>
                <input class="form-control" type="date" name="date" placeholder="dd/mm/yyyy">
                <span class="text-danger">@error('date'){{ $message }} @enderror</span>
              </div>

              <label class="form-label" for="Maintenance Date">Amount</label>
              <div class="input-group mb-3">
                <span class="input-group-text">Amount</span>
                <input class="form-control" type="text" name="amount" aria-label="Amount (to the nearest dollar)" placeholder="5000"><span class="input-group-text">৳</span>
              </div>

              <div class="form-group">
                <label for="Purpose" class="form-label">Purpose</label>
                <select name="purpose" class="form-control">
                  <option>Please select purpose</option>
                  <option value="0">ACQUIRING LAND FOR CONSTRUCTION</option>
                  <option value="1">SITE/LAND LEVELING</option>
                  <option value="2">CLEARING AND TRANSPORTATION</option>
                  <option value="3">RAW MATERIALS</option>
                  <option value="4">BRICKS & BLOCKS</option>
                  <option value="5">STEEL BARS/RODS</option>
                  <option value="6">CEMENT</option>
                  <option value="7">OTHERS</option>
                </select>
                <span class="text-danger">@error('purpose'){{ $message }} @enderror</span>
              </div>

              <div class="form-group">
                <label for="details" class="form-group">Details</label>
                <textarea name="details" class="form-control" cols="2" rows="2"></textarea>
              </div>

             
              <button class="btn btn-primary w-100 d-flex align-items-center justify-content-center" type="submit">Add Now
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
      //Chosen
      $(".multipleChosen").chosen({
          placeholder_text_multiple: "What's your rating" //placeholder
      });
      //Select2
      $(".multipleSelect2").select2({
        placeholder: "What's your rating" //placeholder
      });
    })

  </script>


  @endsection