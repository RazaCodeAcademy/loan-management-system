@extends('admin.layouts.master')

@section('title', 'Customer')

@section('sub_title', 'Create Customer')

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
                <li class="breadcrumb-item"><a href="{{ route('customer.index') }}">@yield('title')</a>
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
                    <h2 class="text-center my-1">Create Customer</h2>
                    <form action="{{ route('customer.store') }}" method="post" enctype="multipart/form-data">
                     <div class="form-body">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Entet Name</label>
                              <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Name">
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
                              <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email...">
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
                              <input type="number" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="Phone...">
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
                                <input type="file"id="uploadImage" class="custom-file-input">
                                <input type="hidden" name="image" id="customerImage" />
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                <br />
                                <span id="uploaded_image"></span>
                              </div>
                            </fieldset>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group mt-2">
                              <label>Enter Address</label>
                              <input type="text" name="address" value="{{ old('address') }}" class="form-control" placeholder="Address...">
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
                              <input type="password" name="password" value="{{ old('password') }}" class="form-control m-input m-input--air" placeholder="Password" required>
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

@section('scripts')
  <script>
    $(document).ready(function(){
      $(document).on('change', '#uploadImage', function(){
        var name = document.getElementById("uploadImage").files[0].name;
        var form_data = new FormData();
        
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
        var f = document.getElementById("uploadImage").files[0];
        // upload image
        form_data.append("image", document.getElementById('uploadImage').files[0]);
        $.ajax({
          url: '{{ route("customer.UploadPhoto") }}',
          method:"POST",
          data: form_data,
          contentType: false,
          cache: false,
          processData: false,
          beforeSend:function(){
            $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
          },   
          success:function(data)
          {
            $('#customerImage').val(data);
            var image = `<img src="{{ asset('Image') }}" width="60">`;
            image = image.replace('Image', data);
            $('#uploaded_image').html(image);
          }
        });
      });
    });
  </script>
@endsection
