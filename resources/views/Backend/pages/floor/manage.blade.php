@extends ('Backend.layouts.main')
@section('title') Floor Information @endsection
  @section('body')
  <div class="page-content-wrapper py-3">
      <div class="container">
        <div class="card">
          <div class="card-body">
            <table class="w-100 align-middle align-item-center align-self-center" id="dataTable">
              <thead>
                <tr>
                  <th>Floor Number</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                <tr>
                  <td>Tiger Nixon</td>
                  <td class="text-right">
                      <div class="btn-group">
                      <a class="m-1" href="#"><i class="bi bi-gear"></i></a>
                      <a class="m-1 text-danger" href="#"><i class="bi bi-trash"></i></a>
                      </div>
                  </td>
                </tr>
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  @endsection