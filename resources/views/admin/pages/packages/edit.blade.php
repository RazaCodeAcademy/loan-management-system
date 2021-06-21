@extends('admin.layouts.master')

@section('title', 'Packages')

@section('sub_title', 'Create Package')

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
                    <h2 class="text-center my-1">Create Package</h2>
                    <form action="{{ route('packages.update', $package->id) }}" method="post" enctype="multipart/form-data">
                      @method('PUT')
                     <div class="form-body">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Enter Package Name</label>
                              <input type="text" name="title" value="{{ $package->title }}" class="form-control" placeholder="Package Name..." required>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Enter Package Description</label>
                              <textarea type="text" rows="10" name="description" class="form-control" placeholder="Package Description...">{{ $package->description }}</textarea>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="repeater">
                                <div class="m-portlet__head-action text-right m-0">
                                  <button type="button" class="btn btn-primary px-5"  
                                    id="add_more_option" data-repeater-create>
                                    {{ __('Add Points') }}
                                  </button>
                              </div>
                              <div data-repeater-list="packagePoints">
                                <div class="row" data-repeater-item>
                                  <div class="col-md-12">
                                    <div class="form-group m-form__group">
                                      <label for="Package Points">
                                        {{ __('Package Points') }}
                                      </label>
                                      <div class="d-flex">
                                        <input type="text" name="items" class="form-control" placeholder="Package Points.....">
                                        <button type="button" class="btn btn-danger btn-sm ml-2"  
                                          id="" data-repeater-delete>
                                          {{ __('Remove') }}
                                        </button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
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

                    <hr>
                    <table class="table table-hover w-100">
                      <thead>
                        <th>#</th>
                        <th>Package Name</th>
                        <th>Points</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                        @if(!empty($package))
                          @foreach ($package->packagePoints as $point)
                            <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $point->package->title }}</td>
                              <td>{{ $point->items }}</td>
                              <td>
                                <a href="{{ route('packages.point', $point->id) }}" class="btn btn-danger">Remove</a>
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
        <!-- Grid With Label end -->

      </div>
    </div>
  </div>
@endsection

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>

	<script>
    
		$('.repeater').repeater({
        initEmpty: true,

        repeaters: [{
            // selector: '.inner-repeater',
            isFirstItemUndeletable: true
        }]
    });
</script>

@endsection