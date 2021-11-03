@extends ('Backend.layouts.main')
@section('title') Edit Floor @endsection
  @section('body')
  <div class="page-content-wrapper py-3">
      <div class="container">
        <!-- Element Heading -->
        <div class="element-heading">
          <h6>Edit Floor</h6>
        </div>
      </div>
      <div class="container">
        <div class="card">
          <div class="card-body">
            <form action="{{ route('floor.update', $floor->id) }}" method="POST">
              @csrf
              <div class="form-group">
                <label class="form-label" for="exampleInputText">Floor Name</label>
                <input class="form-control" id="exampleInputText" value="{{ $floor->floorno }}" type="text" name="floorno" placeholder="Enter Floor Name">
                <span class="text-danger">@error('floorno'){{ $message }} @enderror</span>
              </div>
             
              <button class="btn btn-primary w-100 d-flex align-items-center justify-content-center" type="submit">Save Changes
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