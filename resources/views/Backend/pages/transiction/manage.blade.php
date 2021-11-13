
@extends ('Backend.layouts.main')
@section('title') Transiction List @endsection
  @section('body')
  <div class="page-content-wrapper py-3">
      <div class="container">
        <div class="card">
          <div class="card-body mt-20">
            <table class="w-100 align-middle align-item-center align-self-center" id="dataTable">
              <thead>
                <tr>
                  <th>TraxID</th>
                  <th>Status</th>
                  <th>Amount</th>
                </tr>
              </thead>
              <tbody>
              @foreach($transiction as $value)
                <tr>
                  <td>{{ $value->traxId }}</td>
                  <td>
                      @if( $value->status == 0)
                        <span class="m-0 badge bg-danger">Pending</span>
                      @else
                      <span class="m-0 badge bg-success">Approved</span>
                      @endif
                  </td>
                  <th>{{ $value->amount }} ৳</th>
                 
                </tr>
              @endforeach  
              
                  <tr>
                      <td style="text-align:right;" colspan="2"> Total </td>
                      <td colspan="2"><strong>{{ $transiction->sum('amount') }} ৳</strong></td>
                  </tr>
              
              </tbody>
            </table>
                
          </div>
        </div>
      </div>
    </div>
  @endsection
