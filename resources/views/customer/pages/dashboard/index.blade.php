@extends('customer.layouts.master')

@section('title', 'Dashboard')

@section('content')

  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <!-- Revenue, Hit Rate & Deals -->
        <div class="row">
          <div class="col-lg-3 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h6 class="text-muted">Total Agreements </h6>
                      <h3>{{ $agreements ?? 0 }}</h3>
                    </div>
                    <div class="align-self-center">
                      <i class="la la-briefcase success font-large-2 float-right"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h6 class="text-muted">Total Payments</h6>
                      <h3>{{ $payments ?? 0 }}</h3>
                    </div>
                    <div class="align-self-center">
                      <i class="la la-credit-card danger font-large-2 float-right"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h6 class="text-muted">Total Amounts </h6>
                      <h3>Rs. {{ $amounts ?? 0 }}</h3>
                    </div>
                    <div class="align-self-center">
                      <i class="la la-money success font-large-2 float-right"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h6 class="text-muted">Total Installments</h6>
                      <h3>{{ $installments ?? 0 }}</h3>
                    </div>
                    <div class="align-self-center">
                      <i class="la la-reorder danger font-large-2 float-right"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--/ Revenue, Hit Rate & Deals -->
      </div>
      <div class="content-body">
        <!-- Scroll - horizontal table -->
        <section id="horizontal">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">All Agreements</h4>
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
                          <th>Loan Amount</th>
                          <th>Interest Rate</th>
                          <th>Loan Type</th>
                          <th>Payable Type</th>
                          <th>Late Charges</th>
                          <th>Disbursement Date</th>
                          <th>Created At</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if (!empty(Auth::user()->agreements))
                        @foreach (Auth::user()->agreements->where('cancelation', null) as $agreement)
                            <tr>
                              <td class="align-middle">{{ $agreement->id ?? ''}}</td>
                              <td class="align-middle">{{ $agreement->loanee->name ?? ''}}</td>
                              <td class="align-middle">{{ $agreement->loan_amount ?? ''}}</td>
                              <td class="align-middle">{{ ($agreement->interest_rate.'%') ?? '%'}}</td>
                              <td class="align-middle">{{ $agreement->loanType->loan_type ?? ''}}</td>
                              <td class="align-middle">
                                @if ($agreement->payable_type == 1)
                                  {{ 'Days' }}
                                @elseif($agreement->payable_type == 2)
                                  {{ 'Months' }}
                                @elseif($agreement->payable_type == 3)
                                  {{ 'Years' }}
                                @endif
                              </td>
                              <td class="align-middle">{{ $agreement->late_charges ?? '' }}</td>
                              <td class="align-middle">{{ $agreement->disbursement_date->format('d-M-Y') }}</td>
                              <td class="align-middle">{{ $agreement->created_at->format('d-M-y') ?? ''}}</td>
                              <td class="align-middle d-flex">
                                <a href="{{ route('customer.cancelAgreement', $agreement->id) }}" class="btn btn-danger mx-1" onclick="return confirm('Are you sure you want to cancel the agreement!')"></i>Cancel Agreement</a>
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
   })
</script>
    
@endsection
