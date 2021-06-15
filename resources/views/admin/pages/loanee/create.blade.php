@extends('admin.layouts.master')

@section('title', 'Loanee')

@section('sub_title', 'Create Loanee')

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
                <li class="breadcrumb-item"><a href="{{ route('loanee.index') }}">@yield('title')</a>
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
                    <h2 class="text-center my-1">Create Loanee</h2>
                    <form action="{{ route('loanee.store') }}" method="post" enctype="multipart/form-data">
                     <div class="form-body">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Entet Name</label>
                              <input type="text" name="name" class="form-control" placeholder="Name">
                              @if ($errors->has('name'))
                                @foreach ($errors->get('name') as $error)
                                  <span class="text-danger">{{ $error }}</span>
                                @endforeach
                              @endif
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Enter Email</label>
                              <input type="email" name="email" class="form-control" placeholder="Email...">
                                @if ($errors->has('email'))
                                  @foreach ($errors->get('email') as $error)
                                    <span class="text-danger">{{ $error }}</span>
                                  @endforeach
                                @endif
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Enter Phone</label>
                              <input type="number" name="phone" class="form-control" placeholder="Phone...">
                                @if ($errors->has('phone'))
                                  @foreach ($errors->get('phone') as $error)
                                    <span class="text-danger">{{ $error }}</span>
                                  @endforeach
                                @endif
                            </div>
                          </div>
                          <div class="col-md-12">
                            <fieldset class="form-group">
                              <label>Choose Image</label>
                              <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="inputGroupFile01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                @if ($errors->has('image'))
                                  @foreach ($errors->get('image') as $error)
                                    <span class="text-danger">{{ $error }}</span>
                                  @endforeach
                                @endif
                              </div>
                            </fieldset>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Enter Address</label>
                              <input type="text" name="address" class="form-control" placeholder="Address...">
                                @if ($errors->has('address'))
                                  @foreach ($errors->get('address') as $error)
                                    <span class="text-danger">{{ $error }}</span>
                                  @endforeach
                                @endif
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Select Payment Type</label>
                              <fieldset class="form-group">
                                <select class="custom-select" id="customSelect" name="payment_type">
                                  <option selected="">Select Option</option>
                                  @if (!empty($payment_types))
                                    @foreach ($payment_types as $payment_type)
                                      <option value="{{ $payment_type->id }}">{{ $payment_type->title }}</option>
                                    @endforeach
                                  @endif
                                </select>
                              </fieldset>
                            </div>
                          </div>
                          <div class="col-md-6">									
                            <div class="form-group m-form__group">
                              <label for="password">
                                {{ __('Password') }}
                              </label>
                              <input type="password" name="password" class="form-control m-input m-input--air" placeholder="Password" required>
                              @if ($errors->has('password'))
                                <span class="text-danger">
                                  <strong>{{ $errors->first('password') }}</strong>
                                </span>
                              @endif
                            </div>	
                          </div>
                          <div class="col-md-6">								
                            <div class="form-group m-form__group">
                              <label for="password">
                                {{ __('Confirm Password') }}
                              </label>
                              <input type="password" name="password_confirmation" class="form-control m-input m-input--air" placeholder="Password">
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
