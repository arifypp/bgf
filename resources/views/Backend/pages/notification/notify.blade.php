@extends ('Backend.layouts.main')
@section('title') Notification @endsection
  @section('body')
  <div class="page-content-wrapper py-3">
  <div class="notification-area">
        <div class="container">
        @foreach( $notification as $notify )

        @if(isset($notify->Notification->seen) && $notify->Notification->seen == 0)
           <!-- Single Notification --><a href="{{ route('singlenotify', $notify->id) }}">
           <div class="alert custom-alert-3 alert-primary" role="alert"><i class="bi bi-bell mt-0"></i>
              <div class="alert-text w-75">
              <h6 class="text-truncate">{{ $notify->name }}</h6><span class="text-truncate">{{ $notify->description }}</span>
              </div>
            </div></a>
          @else
         
             <!-- Single Notification --><a href="{{ route('singlenotify', $notify->id) }}" id="notifysee" data-id="{{ $notify->id }}">
            
             <div class="alert unread custom-alert-3 alert-primary" role="alert"><i class="bi bi-bell mt-0"></i>
              <div class="alert-text w-75">
                <h6 class="text-truncate">{{ $notify->name }}</h6><span class="text-truncate">{{ $notify->description }}</span>
              </div>
            </div></a>
          @endif
        @endforeach 
          
        </div>
      </div>
    </div>
  @endsection

  @section('script')
    <script>
      $(document).ready(function() {		
                // Favorite
                $(document).on('click', '#notifysee', function() {
                  
                  $.ajaxSetup({
                    headers: {
                            "X-CSRFToken": '{{csrf_token()}}'
                        }
                    });
                    var token = '{{ Session::token() }}';
                    postId = $(this).data("id");
                    console.log(postId);

                    $.ajax({
                    method : 'POST',
                    url : '{{ route("notification.seenunseen") }}',
                    data : {postId:postId, _token: token},
                    success: function(res) {
                        console.log(res);                     
                              
                      },
                      error:function (res){
                          console.log(error);
                      }

                    })
                })
      });
  </script>

@endsection