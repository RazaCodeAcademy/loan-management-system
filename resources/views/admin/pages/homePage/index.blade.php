@extends('admin.layouts.master')

@section('title', 'Sliders')

@section('sub_title', 'Home Sliders')

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
                <li class="breadcrumb-item"><a href="{{ route('slides.index') }}">@yield('title')</a>
                </li>
              </ol>
            </div>
          </div>
        </div>
        <div class="content-header-right col-md-6 col-12">
          <div class="float-md-right">
            <a href="{{ route('slides.create') }}" class="btn btn-primary round btn-glow px-2 text-white">Add Slider</a>
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
                  <h4 class="card-title">All Sliders</h4>
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
                          <th>Title</th>
                          <th>Description</th>
                          <th>Image</th>
                          <th>Status</th>
                          <th>Created At</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if (!empty($sliders))
                          @foreach ($sliders as $slider)
                            <tr>
                              <td class="align-middle">{{ $slider->id ?? ''}}</td>
                              <td class="align-middle">{{ $slider->title ?? ''}}</td>
                              <td class="align-middle">{{ $slider->description ?? ''}}</td>
                              <td class="align-middle">
                                <img src="{{ $slider->image ? asset( $slider->image ) : ''}}" alt="" width="150">
                              </td>
                              <td class="align-middle">
                                @if($slider->status!=1)
                                  <a href="{{ route('slides.status', $slider->id) }}" onclick="return confirm('Are you sure');"
                                    class="btn btn-danger btn-block">
                                    Approve	
                                  </a>	
                                @endif

                                @if($slider->status==1)
                                  <a href="{{ route('slides.status', $slider->id) }}" onclick="return confirm('Are you sure');"
                                    class="btn btn-success btn-block">
                                    Reject	
                                  </a>
                                @endif
                              </td>
                              <td class="align-middle">{{ $slider->created_at->format('d-M-y') ?? ''}}</td>
                              <td class="align-middle d-flex">
                                <a href="{{ route('slides.show', $slider->id) }}" class="btn btn-success"><i class="la la-eye"></i></a>
                                <a href="{{ route('slides.edit', $slider->id) }}" class="btn btn-info mx-1"><i class="la la-edit"></i></a>
                                <form action="{{ route('slides.destroy', $slider->id) }}" method="post">
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger"><i class="la la-trash"></i></button>
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
   })
</script>
    
@endsection
