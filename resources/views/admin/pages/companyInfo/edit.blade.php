@extends('admin.layouts.master')

@section('title', 'Company Info')

@section('sub_title', 'Create Info')

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
                <li class="breadcrumb-item"><a href="{{ route('company.index') }}">@yield('title')</a>
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
                    <h2 class="text-center my-1">Create Company Info</h2>
                    <form action="{{ route('company.update', $info->id) }}" method="post" enctype="multipart/form-data">
                      @method('PUT')
                     <div class="form-body">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Enter Comppany Name</label>
                              <input type="text" name="name" value="{{ $info->name }}" class="form-control" placeholder="Comppany Name..." min="1" >
                              @if ($errors->has('name'))
                                @foreach ($errors->get('name') as $error)
                                  <span class="text-danger">{{ $error }}</span>
                                @endforeach
                              @endif
                            </div>
                          </div>
                          <div class="col-md-6">
                            <fieldset class="form-group">
                              <label>Choose Logo File</label>
                              <div class="custom-file">
                                <input type="file" name="logo" class="custom-file-input" id="inputGroupFile01" >
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                @if ($errors->has('logo'))
                                  @foreach ($errors->get('logo') as $error)
                                    <span class="text-danger">{{ $error }}</span>
                                  @endforeach
                                @endif
                              </div>
                            </fieldset>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Enter Description</label>
                              <textarea type="number" rows="10" name="description" class="form-control" placeholder="Description...">{{ $info->description }}</textarea>
                                @if ($errors->has('description'))
                                  @foreach ($errors->get('description') as $error)
                                    <span class="text-danger">{{ $error }}</span>
                                  @endforeach
                                @endif
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Enter Contact 1</label>
                              <input type="number" name="contact1" value="{{ $info->contact1 }}" class="form-control" placeholder="Contact 1...">
                                @if ($errors->has('contact1'))
                                  @foreach ($errors->get('contact1') as $error)
                                    <span class="text-danger">{{ $error }}</span>
                                  @endforeach
                                @endif
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Enter Contact 2 <span class="text-seconday">Optional</span></label>
                              <input type="number" name="contact2" value="{{ $info->contact2 }}" class="form-control" placeholder="Contact 2...">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Enter Email</label>
                              <input type="email" name="email" class="form-control" value="{{ $info->email }}" placeholder="Email..." min="1" >
                                @if ($errors->has('email'))
                                  @foreach ($errors->get('email') as $error)
                                    <span class="text-danger">{{ $error }}</span>
                                  @endforeach
                                @endif
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Enter Address</label>
                              <input type="Address" name="address" value="{{ $info->address }}" class="form-control" placeholder="Address..." min="1" >
                                @if ($errors->has('address'))
                                  @foreach ($errors->get('address') as $error)
                                    <span class="text-danger">{{ $error }}</span>
                                  @endforeach
                                @endif
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-actions">
                        <div class="text-left">
                          <button type="submit" class="btn btn-primary">Update <i class="ft-thumbs-up position-left"></i></button>
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
