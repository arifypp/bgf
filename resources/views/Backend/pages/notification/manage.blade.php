@extends ('Backend.layouts.main')
@section('title') Notification System @endsection
  @section('body')
  <div class="page-content-wrapper py-3">
      <div class="container">
        <div class="card">
          <div class="card-body mt-20">
            <table class="w-100 align-middle align-item-center align-self-center" id="dataTable">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($notification as $value)
                <tr>
                  <td>{{ $value->name  }}</td>
                  <td>{{ Illuminate\Support\Str::limit($value->description, 40) }}</td>
                  <td class="text-right">
                      <div class="btn-group">

                      <a class="m-1" href="{{ route('notification.edit', $value->id) }}"><i class="bi bi-gear"></i></a>

                      <a class="m-1 text-danger" href="javascript:void(0)" onclick="deleteConfirmation('{{$value->id}}')"><i class="bi bi-trash"></i></a>

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
                    url:  "{{url('/admin/notification/delete')}}/" + id,
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