@extends ('Backend.layouts.main')
@section('title') Profile Settings @endsection
  @section('body')
  <div class="page-content-wrapper py-3">
      <div class="container">
        <!-- User Information-->
        <div class="card user-info-card mb-3">
          <div class="card-body d-flex align-items-center">
            <div class="user-profile me-3">
              @if( !is_null($users->avatar) )
              <img src="{{ asset('/'. $users->avatar) }}" alt="">
              @else
              <img src="{{ asset('/assets/img/bg-img/2.jpg') }}" alt="">
              @endif
            </div>
            <div class="user-info">
              <div class="d-flex align-items-center">
                <h5 class="mb-1">{{ $users->name }}</h5>
              </div>
              <p class="mb-0">
                  @foreach( App\Models\Backend\Flatowner::where('userID', auth()->user()->id )->get() as $value )
                    You're owned of {{ $value->unit->unitname }}
                  @endforeach
              </p>
            </div>
          </div>
        </div>
        <!-- User Meta Data-->
        <div class="card user-data-card">
          <div class="card-body">
            
          <form action="{{ route('settings.updateprofile', $users->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group mb-3">
                <label class="form-label" for="fullname">Full Name</label>
                <input class="form-control" name="name" id="fullname" type="text" value="{{ $users->name }}" placeholder="Full Name" readonly>
              </div>

              <div class="form-group mb-3">
                <label class="form-label" for="email">Email Address</label>
                <input class="form-control" id="email" name="email" type="text" value="{{ $users->email }}" placeholder="Email Address" readonly>
              </div>

              <div class="form-group mb-3">
                <label class="form-label" for="Date of birth">Date of birth </label>
                <input  type="date" name="dateofbirth" class="form-control" id="dateofbirth"  value="{{ $users->dob }}" placeholder="Date of birth Here">
              </div>
             
              <div class="form-group mb-3">
                <label class="form-label" for="address">Address</label>
                <input class="form-control" id="address" name="address" type="text" value="{{ $users->address }}" placeholder="Address">
              </div>

              <div class="form-group mb-3">
              <input type="file" name="avatar" class="form-control" >
              </div>
             
              <button class="btn btn-success w-100" type="submit">Update Now</button>

            </form>
            @if(Session::has('message'))
          <div class="alert custom-alert-2 {{ Session::get('alert-class', 'alert-info') }} alert-dismissible fade show">
              {{ Session::get('message') }}
              <button type="button" class="btn btn-close btn-close-white position-relative p-1 ms-auto" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          @endif
          </div>
        </div>
      </div>
    </div>


  @endsection