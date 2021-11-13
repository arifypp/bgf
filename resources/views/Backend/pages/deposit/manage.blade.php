
@extends ('Backend.layouts.main')
@section('title') Deposit List @endsection
  @section('body')
  <div class="page-content-wrapper py-3">
      <div class="container">
        <div class="card">
          <div class="card-body mt-20">
            <table class="w-100 align-middle align-item-center align-self-center" id="dataTable">
              <thead>
                <tr>
                  <th>TraxID</th>
                  <th>Name</th>
                  <th>Amount</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($Depositor as $value)
                <tr>
                  <td>{{ $value->traxId }}</td>
                  <td>{{ $value->name  }}</td>
                  <th>{{ $value->amount }} ৳</th>
                  <td class="text-right">
                      <div class="btn-group">
                      @if($value->status == 0)
                      <a href="javascript:void(0)" class="m-1 text-success" id="Depositstatus" data-id="{{ $value->id }}" data-attr="{{ route('deposit.status', $value->id) }}"><i class="bi bi-check-square"></i></a>
                      @else
                      <a href="javascript:void(0)" title="Approved" class="m-1 text-success"><i class="bi bi-check-square-fill"></i></a>
                      @endif
                      <a class="m-1 text-info" href="{{ route('deposit.invoice', $value->id) }}"><i class="bi bi-receipt"></i></a>

                      <a class="m-1 text-danger" href="javascript:void(0)" onclick="deleteConfirmation('{{$value->id}}')"><i class="bi bi-trash"></i></a>

                      </div>
                  </td>
                </tr>
              @endforeach  
              
                  <tr>
                      <td style="text-align:right;" colspan="2"> Total </td>
                      <td colspan="2"><strong>{{ $value->sum('amount') }} ৳</strong></td>
                  </tr>
              
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
                    url:  "{{url('/admin/deposit/delete')}}/" + id,
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

    // Status by admin
    $(document).ready(function(){
      $(document).on("click", '#Depositstatus', function(e){
        e.preventDefault();
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
              }
          });

          var token = '{{ Session::token() }}';

          let href = $(this).attr('data-attr');
          let post_id = $(this).attr('data-id');

          console.log(post_id); 
          
          $.ajax({    
              type: 'POST',
              url: href,
              data : {id:post_id, _token: token},
              success:function(res){
                if(res.success){
                        toastr.success(res.message);
                        setTimeout(function(){location.reload();},5000);
                  }
              },
              error:function (res){
                    console.log("error");
                }
          });

          return false;
      })
    });
</script>
  @endsection