@extends('admin.layouts.master')

@section('title', 'Payments')

@section('sub_title', 'All Payments')

@section('content')

<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">@yield('title')</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('payments.index') }}">@yield('title')</a>
                </li>
              </ol>
            </div>
          </div>
        </div>
        <div class="content-header-right col-md-6 col-12">
          <div class="float-md-right">
            <a href="{{ route('payments.create') }}" class="btn btn-primary round btn-glow px-2 text-white">Add Payment</a>
            </div>
          </div>
        </div>
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
                    <table class="table display nowrap table-striped table-bordered scroll-horizontal w-100" id="dtTable">
                      <thead class="w-100" style="width: 100%">
                        <tr>
                          <th class="sorting_desc">#</th>
                          <th>Payer Name</th>
                          <th>Agreement</th>
                          <th>Amount</th>
                          <th>Late Charges</th>
                          <th>Installment</th>
                          <th>Last Date</th>
                          <th>Status</th>
                          <th>Created At</th>
                          <th>Action</th>
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
                              <td class="align-middle">{{ $payment->late_charges ?? 0}}</td>
                              <td class="align-middle">{{ $payment->installment ?? ''}}</td>
                              <td class="align-middle">{{ $payment->last_date->format('d-M-y') ?? ''}}</td>
                              <td class="align-middle">{{ $payment->status ? 'Paid' : 'Unpaid'}}</td>
                              <td class="align-middle">{{ $payment->created_at->format('d-M-y') ?? ''}}</td>
                              <td class="align-middle d-flex">
                                <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-info mx-1"><i class="la la-edit"></i></a>
                                <form action="{{ route('payments.destroy', $payment->id) }}" method="post">
                                  @method('DELETE')
                                  <button type="submit"  href="" class="btn btn-danger"><i class="la la-trash"></i></button>
                                </form>
                            </td>
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
      "sScrollX": '100%',
   })
</script>
    
@endsection
