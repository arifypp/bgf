@extends ('Backend.layouts.main')
@section('title') Invoice Preview @endsection
  @section('body')
 
  <div class="page-content-wrapper py-3">
      <div class="container">
        <div class="card invoice-card shadow">
          <div class="card-body">
            <!-- Download Invoice -->
            <div class="download-invoice text-end mb-3"><a class="btn btn-sm btn-primary me-2" href="#"><i class="bi bi-file-earmark-pdf me-1"></i>PDF</a><a class="btn btn-sm btn-light" href="#"><i class="bi bi-printer me-1"></i>Print</a></div>
            <!-- Invoice Info -->
            <div class="invoice-info text-end mb-4">
              <h5 class="mb-1 fz-14">Bismillah Garden Family.</h5>
              <h6 class="fz-12">Invoice No. #{{ $maintenance->id }}</h6>
              <p class="mb-0 fz-12">Date: {{date('M d, Y', strtotime($maintenance->date))}}</p>
            </div>
            <!-- Invoice Table -->
            <div class="invoice-table">
              <div class="table-responsive">
                <table class="table table-bordered caption-top">
                  <caption>List of works</caption>
                  <thead class="table-light">
                    <tr>
                      <th>Sl.</th>
                      <th>Description</th>
                      <th>Unit</th>
                      <th>Q.</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>{{ $maintenance->title }}</td>
                      <td>৳ {{ $maintenance->amount }}</td>
                      <td>1</td>
                      <td>৳ {{ $maintenance->amount }}</td>
                    </tr>

                  </tbody>
                  <tfoot class="table-light">
                    <tr>
                      <td class="text-end" colspan="4">Total:</td>
                      <td class="text-end">৳ {{ $maintenance->amount }}</td>
                    </tr>
                    <tr>
                      <td class="text-end" colspan="4">VAT (0%):</td>
                      <td class="text-end">৳ 0</td>
                    </tr>
                    <tr>
                      <td class="text-end" colspan="4">Grand Total:</td>
                      <td class="text-end">৳ {{ $maintenance->amount }}</td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
            <p class="mb-0">Notice: This is auto generated invoice.</p>
          </div>
        </div>
      </div>
    </div>

  @endsection

