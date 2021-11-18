@extends ('Backend.layouts.main')
@section('title') Floor Information @endsection
  @section('body')
  <div class="page-content-wrapper py-3">
      <div class="container">
        <div class="card">
        @if(Session::has('message'))
          <div class="alert custom-alert-2 {{ Session::get('alert-class', 'alert-info') }} alert-dismissible fade show">
              {{ Session::get('message') }}
              <button type="button" class="btn btn-close btn-close-white position-relative p-1 ms-auto" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          @endif
          <div class="card-body mt-20">
            <table class="w-100 align-middle align-item-center align-self-center" id="dataTable">
              <thead>
                <tr>
                  <th>Floor Number</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($floor as $floors)
                <tr>
                  <td>{{ $floors->floorno  }}</td>
                  
                 
                  <td class="text-right">
                  @if(Auth::user()->is_super == 0)
                      <div class="btn-group">
                      <a class="m-1" href="{{ route('floor.edit', $floors->id) }}"><i class="bi bi-gear"></i></a>
                      <a class="m-1 text-danger" href="#" data-bs-toggle="modal" data-bs-target="#DeleteFloor{{ $floors->id }}"><i class="bi bi-trash"></i></a>
                      </div>
                   @endif
                  </td>
                  @if(Auth::user()->is_super == 0)
                  <!-- Modal view -->
                  <div class="modal fade" id="DeleteFloor{{ $floors->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Delete</h6>
                        <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <h3>Are you sure want to delete?</h3>
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-sm btn-secondary" type="button" data-bs-dismiss="modal">No</button>
                        <a href="{{ route('floor.destroy', $floors->id) }}" class="btn btn-sm btn-primary">Confirm</a>
                      </div>
                    </div>
                  </div>
                </div>
                @endif
                </tr>
              @endforeach  
              </tbody>
            </table>
                
          </div>
        </div>
      </div>
    </div>
  @endsection
