@extends ('Backend.layouts.main')
@section('title') Edition Notificaiton @endsection
  @section('body')
  <div class="page-content-wrapper py-3">
      <div class="container">
        <!-- Element Heading -->
        <div class="element-heading">
          <h6>Edition Notificaiton</h6>
        </div>
      </div>
      <div class="container">
        <div class="card">
          <div class="card-body">
            <form action="{{ route('notification.update', $notification->id) }}" method="POST">
              @csrf
              <div class="form-group">
                <label class="form-label" for="exampleInputText">Title</label>
                <input class="form-control" type="text" name="name" placeholder="Enter Notification Title" value="{{ $notification->name }}">
                <span class="text-danger">@error('name'){{ $message }} @enderror</span>
              </div>   
              <div class="form-group">
                <label for="type" class="form-label">Type</label>
                <select name="type" class="form-control">
                  <option>Please select type</option>
                  <option value="0" @if ($notification->type == 0) selected @endif >Regular</option>
                  <option value="1" @if ($notification->type == 1) selected @endif >Important</option>
                  <option value="2" @if ($notification->type == 2) selected @endif >Urgent</option>
                  <option value="3" @if ($notification->type == 3) selected @endif >Other</option>
                </select>
                <span class="text-danger">@error('type'){{ $message }} @enderror</span>
              </div>

              <div class="form-group">
                <label for="description" class="form-group">Details</label>
                <textarea name="description" class="form-control" cols="2" rows="2">{{ $notification->description }}</textarea>
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