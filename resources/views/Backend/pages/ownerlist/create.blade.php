@extends ('Backend.layouts.main')
@section('title') Create Floor @endsection
  @section('body')
  <div class="page-content-wrapper py-3">
      <div class="container">
        <!-- Element Heading -->
        <div class="element-heading">
          <h6>Create New Floor</h6>
        </div>
      </div>
      <div class="container">
        <div class="card">
          <div class="card-body">
            <form action="{{ route('unit.store') }}" method="POST">
              @csrf
              <div class="form-group">
                <label class="form-label" for="exampleInputText">Floor Name</label>
                <select class="form-select form-select-sm" id="floorno" aria-label="Default select example" name="floorno">
                  <option value="-0" selected="">-- Please Select --</option>
                  @foreach(App\Models\Backend\Floor::orderBy('id', 'desc')->get() as $floor)
                  <option value="{{ $floor->id }}">{{ $floor->floorno }}</option>
                  @endforeach
                </select>	
                <span class="text-danger">@error('floorno'){{ $message }} @enderror</span>
              </div>
              
              <div class="form-group">
                <label class="form-label" for="exampleInputText">Unit Name</label>
                <select class="form-select form-select-sm" id="unitname" aria-label="Default select example" name="unitname">
                  <option value="-0" selected="">-- Please Select --</option>
                  @foreach(App\Models\Backend\Unit::orderBy('id', 'desc')->get() as $unit)
                  <option value="{{ $unit->id }}">{{ $unit->unitname }}</option>
                  @endforeach
                </select>	
                <span class="text-danger">@error('unitname'){{ $message }} @enderror</span>
              </div>

              <div class="form-group">
                <label class="form-label" for="exampleInputText">Owner Name</label>
                <select class="form-select form-select-sm" id="defaultSelectSm" aria-label="Default select example" name="owneruser">
                  <option value="-0" selected="">-- Please Select --</option>
                  @foreach(App\Models\User::orderBy('id', 'desc')->get() as $owner)
                  <option value="{{ $owner->id }}">{{ $owner->name }}</option>
                  @endforeach
                </select>	
                <span class="text-danger">@error('owneruser'){{ $message }} @enderror</span>
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
