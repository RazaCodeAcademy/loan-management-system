@extends('customer.layouts.master')

@section('title', 'Payments')

@section('content')

  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <!-- Scroll - horizontal table -->
        <section id="horizontal">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">All Payments</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body card-dashboard">
                    <table class="table display nowrap table-striped table-bordered w-100" id="dtTable">
                      <thead class="w-100" style="width: 100%">
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Agreement</th>
                          <th>Amount</th>
                          <th>Late Charges</th>
                          <th>Installment</th>
                          <th>Created At</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if (!empty($payments))
                        @foreach ($payments as $payment)
                            <tr>
                              <td class="align-middle">{{ $payment->id ?? ''}}</td>
                              <td class="align-middle">{{ $payment->payer_name ?? ''}}</td>
                              <td class="align-middle">{{ ('L-00'.$payment->agreement_id) ?? ''}}</td>
                              <td class="align-middle">{{ $payment->amount ?? ''}}</td>
                              <td class="align-middle">{{ $payment->late_charges ?? ''}}</td>
                              <td class="align-middle">{{ $payment->installment ?? '%'}}</td>
                              <td class="align-middle">{{ $payment->created_at->format('d-M-y') ?? ''}}</td>
                            </tr>
                          @endforeach
                        @endif
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>

@endsection

@section('scripts')

<script>
   $.fn.dataTableExt.sErrMode = 'none';
   $('#dtTable').DataTable({
      sorting:false,
   })
</script>

@endsection
