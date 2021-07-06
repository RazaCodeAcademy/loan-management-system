@extends('admin.layouts.master')

@section('title', 'Payments')

@section('sub_title', 'Create Payment')

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
                <li class="breadcrumb-item"><a href="{{ route('payment_types.index') }}">@yield('title')</a>
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content-body">

        <!-- Grid With Label start -->
        <section class="grid-with-label" id="grid-with-label">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-content collapse show">
                  <div class="card-body">
                    <h2 class="text-center my-1">Create Payment</h2>
                    <form action="{{ route('payments.store') }}" method="post" enctype="multipart/form-data">
                     <div class="form-body">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Enter Payer Name</label>
                              <input type="text" name="payer_name" class="form-control" placeholder="Payment Name..." required>
                              @if ($errors->has('payer_name'))
                                @foreach ($errors->get('payer_name') as $error)
                                  <span class="text-danger">{{ $error }}</span>
                                @endforeach
                              @endif
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Select Agreement</label>
                              <fieldset class="form-group">
                                <select class="custom-select" id="customSelect" name="agreement_id" required onchange="getAgreementInfo(this.value)">
                                  <option selected="">Select Option</option>
                                  @if (!empty($agreements))
                                    @foreach ($agreements as $agreement)
                                      <option value="{{ $agreement->id }}">{{ $agreement->loanee->name.' ( L-00'.$agreement->id.' )' }}</option>
                                    @endforeach
                                  @endif
                                </select>
                              </fieldset>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Enter Amount</label>
                              <input type="number" name="amount" class="form-control" placeholder="Amount..." required>
                              @if ($errors->has('amount'))
                                @foreach ($errors->get('amount') as $error)
                                  <span class="text-danger">{{ $error }}</span>
                                @endforeach
                              @endif
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Late Charges</label>
                              <input type="number" name="late_charges" id="late_charges" value="0" class="form-control" placeholder="Late Charges..." min="0" readonly>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Installment</label>
                              <input type="number" name="installment" id="installment" value="0" class="form-control" placeholder="Installment..." min="0" readonly>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Last Date</label>
                              <input type="date" name="last_date" id="last_date" class="form-control" placeholder="Last Date..." readonly>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-actions">
                        <div class="text-left">
                          <button type="submit" class="btn btn-primary">Submit <i class="ft-thumbs-up position-left"></i></button>
                          <button type="reset" class="btn btn-warning">Reset <i class="ft-refresh-cw position-left"></i></button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Grid With Label end -->
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script>
    getAgreementInfo = (id) =>{

      var getAgreementInfo = '{{ route("getAgreementInfo", "AgrId") }}';
      getAgreementInfo = getAgreementInfo.replace("AgrId", id);
      // debugger;
      $.ajax({
          type: "get",
          url: `${getAgreementInfo}`,
          success: function(response) {
              if (response != '') {
                var last_date = dateFormat(new Date(response.last_date))
                document.getElementById('late_charges').value = response.late_charges;
                document.getElementById('installment').value = response.installment;
                document.getElementById('last_date').value = last_date;
              }else{
                  alert("Sorry No Products Found");
              }
          }
      });
    }

    function dateFormat(date){
      var day = date.getDate();
      var month = date.getMonth() + 1;
      var year = date.getFullYear();
      var format =  year + '-' + (month < 10 ? ('0' + month) : month) + '-' + (day < 10 ? ('0' + day) : day)
      return format;
    }
  </script>
@endsection
