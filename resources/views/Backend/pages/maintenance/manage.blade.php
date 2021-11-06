@extends ('Backend.layouts.main')
@section('title') Maintenance Cost @endsection
  @section('body')
  <div class="page-content-wrapper py-3">
      <div class="container">
        <div class="card">
          <div class="card-body mt-20">
            <table class="w-100 align-middle align-item-center align-self-center" id="dataTable">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Date</th>
                  <th>Ammount</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($maintenance as $value)
                <tr>
                  <td>{{ $value->title  }}</td>
                  <td>{{ $value->date  }}</td>
                  <th>{{ $value->amount }} ৳</th>
                  <td class="text-right">
                      <div class="btn-group">
                      <a class="m-1" href="{{ route('unit.edit', $value->id) }}"><i class="bi bi-gear"></i></a>
                      <a class="m-1 text-danger" href="#" data-bs-toggle="modal" data-bs-target="#DeleteUnit{{ $value->id }}"><i class="bi bi-trash"></i></a>
                      </div>
                  </td>
                  <!-- Modal view -->
                  <div class="modal fade" id="DeleteUnit{{ $value->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
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
                        <a href="{{ route('unit.destroy', $value->id) }}" class="btn btn-sm btn-primary">Confirm</a>
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