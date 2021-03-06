@extends ('Backend.layouts.main')
@section('title') Unit Information @endsection
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
                  <th>Unit Number</th>
                  @if( auth()->user()->is_super == 0 )
                  <th>Action</th>
                  @endif
                </tr>
              </thead>
              <tbody>
              @foreach($unit as $units)
                <tr>
                  <td>{{ $units->floor->floorno  }}</td>
                  <td>{{ $units->unitname  }}</td>
                @if( auth()->user()->is_super == 0 )
                  <td class="text-right">
                      <div class="btn-group">
                      <a class="m-1" href="{{ route('unit.edit', $units->id) }}"><i class="bi bi-gear"></i></a>
                      <a class="m-1 text-danger" href="#" data-bs-toggle="modal" data-bs-target="#DeleteUnit{{ $units->id }}"><i class="bi bi-trash"></i></a>
                      </div>
                  </td>
                @endif
                  <!-- Modal view -->
                  <div class="modal fade" id="DeleteUnit{{ $units->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
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
                        <a href="{{ route('unit.destroy', $units->id) }}" class="btn btn-sm btn-primary">Confirm</a>
                      </div>
                    </div>
                  </div>
                </div>
                </tr>
              @endforeach  
              </tbody>
            </table>
                
          </div>
        </div>
      </div>
    </div>
  @endsection
