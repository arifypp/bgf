@extends ('Backend.layouts.main')
@section('title') Ownerlist Information @endsection
  @section('body')
  <div class="page-content-wrapper py-3">
      <div class="container">
        <div class="card">
          <div class="card-body mt-20">
            <table class="w-100 align-middle align-item-center align-self-center" id="dataTable">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Floor</th>
                  <th>Unit</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($ownerlist as $ownerlists)
                <tr>
                  <td>{!! Illuminate\Support\Str::limit($ownerlists->user->name, 10) !!}</td>
                  <td>{!! Illuminate\Support\Str::limit($ownerlists->floor->floorno, 6) !!}</td>
                  <td>{!! Illuminate\Support\Str::limit($ownerlists->unit->unitname, 6) !!}</td>
                  <td class="text-right">
                      <div class="btn-group">
                      <a href="javascript:void(0)" class="m-1" data-bs-toggle="modal" data-bs-target="#ViewOwner{{ $ownerlists->id }}"><i class="bi bi-eye"></i></a>
                      <!-- Modal view -->
                      <div class="modal fade" id="ViewOwner{{ $ownerlists->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h6 class="modal-title" id="exampleModalLabel">Flat Owner Details of {{ $ownerlists->user->name }}</h6>
                              <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <table class="table mb-0 borderd-0">
                                  <tbody>
                                    <tr>
                                      <th>Name :</th>
                                      <td><strong>{{ $ownerlists->user->name }}</strong></td>
                                    </tr>
                                    <tr>
                                      <th>Email :</th>
                                      <td><strong>{{ $ownerlists->user->email }}</strong></td>
                                    </tr>
                                    <tr>
                                      <th>Phone :</th>
                                      <td><strong>017XXXXXX</strong></td>
                                    </tr>
                                    <tr>
                                      <th>Flat Reserved :</th>
                                      <td><strong>{{ $ownerlists->floor->floorno }}</strong></td>
                                    </tr>
                                    <tr>
                                      <th>Unit Reserved :</th>
                                      <td><strong>{{ $ownerlists->unit->unitname }}</strong></td>
                                    </tr>
                                  </tbody>
                              </table>
                            </div>
                            <div class="modal-footer">
                              <button class="btn btn-sm btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                              <button class="btn btn-sm btn-success" type="button">Save</button>
                            </div>
                          </div>
                        </div>
                      </div>








                      <a class="m-1" href="{{ route('ownerlist.edit', $ownerlists->id) }}"><i class="bi bi-gear"></i></a>
                      <a class="m-1 text-danger" href="javascript:void(0)" onclick="deleteConfirmation('{{$ownerlists->id}}')"><i class="bi bi-trash"></i></a>

                      </div>
                  </td>
                </tr>
              @endforeach  
              </tbody>
            </table>
                
          </div>
        </div>
      </div>
    </div>
  @endsection

  @section('script')
  <script type="text/javascript">
    function deleteConfirmation(id) {
        swal.fire({
            title: "Delete?",
            icon: 'question',
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            dangerMode: true,
            reverseButtons: !0
        }).then(function (e) {

            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajaxSetup({
	                headers: {
	                    'X-CSRF-TOKEN': '{{csrf_token()}}'
	                }
	            });
                
                $.ajax({
                    type: 'POST',
                    url:  "{{url('/admin/ownerlist/delete')}}/" + id,
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                        if (results.success === true) {
                            swal.fire("Done!", results.message, "success");
                            // refresh page after 2 seconds
                            $('#dataTable').load(document.URL + ' #dataTable');     // Using .reload() method.
                        } else {
                            swal.fire("Error!", results.message, "error");
                        }
                    }
                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })
    }
</script>
  @endsection