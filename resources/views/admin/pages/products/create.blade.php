@extends('admin.layouts.master')

@section('title', 'Products')

@section('sub_title', 'Create Product')

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
                <li class="breadcrumb-item"><a href="{{ route('products.index') }}">@yield('title')</a>
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
                    <h2 class="text-center my-1">Create Product</h2>
                    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                     <div class="form-body">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Select Product</label>
                              <fieldset class="form-group">
                                <select class="custom-select" id="customSelect" name="title" required>
                                  <option selected="">Select Option</option>
                                  @if (!empty($products))
                                    @foreach ($products as $product)
                                      <option value="{{ $product->product_name }}">{{ $product->loanee->name .' | L00'. $product->id .' | '. $product->product_name }}</option>
                                    @endforeach
                                  @endif
                                </select>
                              </fieldset>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Enter Description</label>
                              <textarea type="text" name="description" rows="10" class="form-control" placeholder="Description..." required></textarea>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Select Category</label>
                              <fieldset class="form-group">
                                <select class="custom-select" id="customSelect" name="category_id" required>
                                  <option selected="">Select Option</option>
                                  @if (!empty($categories))
                                    @foreach ($categories as $category)
                                      <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                  @endif
                                </select>
                              </fieldset>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <fieldset class="form-group">
                              <label>Choose Image</label>
                              <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="inputGroupFile01" required>
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                              </div>
                            </fieldset>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Enter Discount %</label>
                              <input type="number" name="discount" class="form-control" placeholder="Discount %..." min="1" required>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Enter Price</label>
                              <input type="number" name="price" class="form-control" placeholder="Price..." min="1" required>
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
