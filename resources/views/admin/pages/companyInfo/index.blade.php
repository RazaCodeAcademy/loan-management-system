@extends('admin.layouts.master')

@section('title', 'Company Info')

@section('sub_title', 'All Info')

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
        <div class="content-header-right col-md-6 col-12">
          <div class="float-md-right">
            <a href="{{ route('company.create') }}" class="btn btn-primary round btn-glow px-2 text-white">Add Company Info</a>
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
                  <h4 class="card-title">All Company Info</h4>
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
                          <th>Company Name</th>
                          <th>Logo</th>
                          <th>Email</th>
                          <th>Contact1</th>
                          <th>Contact2</th>
                          <th>Address</th>
                          <th>Created At</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if (!empty($informations))
                        @foreach ($informations as $info)
                            <tr>
                              <td class="align-middle">{{ $info->id ?? ''}}</td>
                              <td class="align-middle">{{ $info->name ?? ''}}</td>
                              <td class="align-middle">
                                <img src="{{ asset($info->logo) ?? ''}}" alt="{{ $info->name ?? ''}}" width="100">
                              </td>
                              <td class="align-middle">{{ $info->email ?? ''}}</td>
                              <td class="align-middle">{{ $info->contact1 ?? '%'}}</td>
                              <td class="align-middle">{{ $info->contact2 ?? ''}}</td>
                              <td class="align-middle">{{ $info->address ?? '' }}</td>
                              <td class="align-middle">{{ $info->created_at->format('d-M-y') ?? ''}}</td>
                              <td class="align-middle">
                                @if($info->status!=1)
                                  <a href="{{ route('company.status', $info->id) }}" onclick="return confirm('Are you sure');"
                                    class="btn btn-danger btn-block">
                                    Approve	
                                  </a>	
                                @endif
                                @if($info->status==1)
                                  <a href="{{ route('company.status', $info->id) }}" onclick="return confirm('Are you sure');"
                                    class="btn btn-success btn-block">
                                    Reject	
                                  </a>
                                @endif
                              </td>
                              <td class="align-middle d-flex">
                                <a href="{{ route('company.edit', $info->id) }}" class="btn btn-info mx-1"><i class="la la-edit"></i></a>
                                <form action="{{ route('company.destroy', $info->id) }}" method="post">
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure');"><i class="la la-trash"></i></button>
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
