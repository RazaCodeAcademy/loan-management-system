@extends('admin.layouts.master')

@section('title', 'Services')

@section('sub_title', 'All Services')

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
        <div class="content-header-right col-md-6 col-12">
          <div class="float-md-right">
            <a href="{{ route('services.create') }}" class="btn btn-primary round btn-glow px-2 text-white">Add Products</a>
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
                  <h4 class="card-title">All Services</h4>
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
                          <th>#</th>
                          <th>Title</th>
                          <th>Description</th>
                          <th>Category</th>
                          <th>Image</th>
                          <th>Discount</th>
                          <th>Price</th>
                          <th>Created At</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if (!empty($services))
                        @foreach ($services as $service)
                            <tr>
                              <td class="align-middle">{{ $service->id ?? ''}}</td>
                              <td class="align-middle">{{ $service->title ?? ''}}</td>
                              <td class="align-middle">{{ $service->description ?? ''}}</td>
                              <td class="align-middle">{{ $service->category->title ?? ''}}</td>
                              <td class="align-middle">
                                <img src="{{ $service->image ? asset($service->image) : ''}}" alt="{{ $service->title ?? ''}}" width="50">
                              </td>
                              <td class="align-middle">{{ ($service->discount.'%') ?? '0%'}}</td>
                              <td class="align-middle">{{ $service->price ?? '' }}</td>
                              <td class="align-middle">{{ $service->created_at->format('d-M-y') ?? ''}}</td>
                              <td class="align-middle">
                                @if($service->status!=1)
                                  <a href="{{ route('services.status', $service->id) }}" onclick="return confirm('Are you sure');"
                                    class="btn btn-danger btn-block">
                                    Approve	
                                  </a>	
                                @endif
                                @if($service->status==1)
                                  <a href="{{ route('services.status', $service->id) }}" onclick="return confirm('Are you sure');"
                                    class="btn btn-success btn-block">
                                    Reject	
                                  </a>
                                @endif
                              </td>
                              <td class="align-middle d-flex">
                                <a href="{{ route('services.edit', $service->id) }}" class="btn btn-info mx-1"><i class="la la-edit"></i></a>
                                <form action="{{ route('services.destroy', $service->id) }}" method="post">
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
      "sScrollX": '100%',
   })
</script>
    
@endsection
