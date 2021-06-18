@extends('admin.layouts.master')

@section('title', 'Services')

@section('sub_title', 'Create Service')

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
                <li class="breadcrumb-item"><a href="{{ route('services.index') }}">@yield('title')</a>
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
                    <h2 class="text-center my-1">Create Service</h2>
                    <form action="{{ route('services.store') }}" method="post" enctype="multipart/form-data">
                     <div class="form-body">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Enter Title</label>
                              <input type="text" name="title" class="form-control" placeholder="Title..." required>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Enter Description</label>
                              <textarea type="text" name="description" rows="10" class="form-control" placeholder="Description..." required></textarea>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <fieldset class="form-group">
                              <label>Choose Image</label>
                              <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="inputGroupFile01" required>
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                              </div>
                            </fieldset>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Select Loan Type</label>
                              <fieldset class="form-group">
                                <select class="custom-select" id="customSelect" name="loan_type" required>
                                  <option selected="">Select Option</option>
                                  @if (!empty($products))
                                    @foreach ($products as $product)
                                      <option value="{{ $product->product }}">{{ $product->product }}</option>
                                    @endforeach
                                  @endif
                                </select>
                              </fieldset>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Enter Expected Disbursement Date</label>
                              <input type="date" name="disbursement_date" class="form-control" required>
                                @if ($errors->has('disbursement_date'))
                                  @foreach ($errors->get('disbursement_date') as $error)
                                    <span class="text-danger">{{ $error }}</span>
                                  @endforeach
                                @endif
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Select Payable Type</label>
                              <fieldset class="form-group">
                                <select class="custom-select" id="customSelect" name="payable_type" required>
                                  <option selected="">Select Option</option>
                                  <option value="1">Days</option>
                                  <option value="2">Weeks</option>
                                  <option value="3">Months</option>
                                </select>
                              </fieldset>
                            </div>
                          </div>
                          
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Enter Interest Rate %</label>
                              <input type="number" name="interest_rate" class="form-control" placeholder="Interest Rate %..." min="1" required>
                                @if ($errors->has('interest_rate'))
                                  @foreach ($errors->get('interest_rate') as $error)
                                    <span class="text-danger">{{ $error }}</span>
                                  @endforeach
                                @endif
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Enter Late Charges Per Day</label>
                              <input type="number" name="late_charges" class="form-control" placeholder="Late Charges Per Day..." min="1" required>
                                @if ($errors->has('late_charges'))
                                  @foreach ($errors->get('late_charges') as $error)
                                    <span class="text-danger">{{ $error }}</span>
                                  @endforeach
                                @endif
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Enter Expected First Payment</label>
                              <input type="date" name="expected_first_payment_date" class="form-control" placeholder="Expected First Payment...">
                                @if ($errors->has('expected_first_payment_date'))
                                  @foreach ($errors->get('expected_first_payment_date') as $error)
                                    <span class="text-danger">{{ $error }}</span>
                                  @endforeach
                                @endif
                            </div>
                          </div>
                          <div class="col-md-6">
                            <fieldset class="form-group">
                              <label>Product Image</label>
                              <div class="custom-file">
                                <input type="file" name="product" class="custom-file-input" id="inputGroupFile01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                @if ($errors->has('product'))
                                  @foreach ($errors->get('product') as $error)
                                    <span class="text-danger">{{ $error }}</span>
                                  @endforeach
                                @endif
                              </div>
                            </fieldset>
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
