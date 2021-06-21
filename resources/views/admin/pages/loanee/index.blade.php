@extends('admin.layouts.master')

@section('title', 'Loanee')

@section('sub_title', 'All Loanee')

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
        <div class="content-header-right col-md-6 col-12">
          <div class="float-md-right">
            <a href="{{ route('loanee.create') }}" class="btn btn-primary round btn-glow px-2 text-white">Add Loanee</a>
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
                  <h4 class="card-title">All Loanee</h4>
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
                          <th>Name</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Payment Type</th>
                          <th>Agreement</th>
                          <th>Status</th>
                          <th>Created At</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if (!empty($loanees))
                        @foreach ($loanees as $loanee)
                            <tr>
                              <td class="align-middle">{{ $loanee->id ?? ''}}</td>
                              <td class="align-middle">{{ $loanee->name ?? ''}}</td>
                              <td class="align-middle">{{ $loanee->email ?? ''}}</td>
                              <td class="align-middle">{{ $loanee->phone ?? ''}}</td>
                              <td class="align-middle">{{ $loanee->paymentType->title ?? ''}}</td>
                              <td class="align-middle">
                                <a href="{{ route('agreement.create', $loanee->id) }}" class="btn btn-info mx-1"><i class="la la-briefcase"></i></a>
                              </td>
                              <td class="align-middle">
                                @if($loanee->status!=1)
                                  <a href="{{ route('loanee.status', $loanee->id) }}" onclick="return confirm('Are you sure');"
                                    class="btn btn-danger btn-block">
                                    Approve	
                                  </a>	
                                @endif

                                @if($loanee->status==1)
                                  <a href="{{ route('loanee.status', $loanee->id) }}" onclick="return confirm('Are you sure');"
                                    class="btn btn-success btn-block">
                                    Reject	
                                  </a>
                                @endif
                              </td>
                              <td class="align-middle">{{ $loanee->created_at->format('d-M-y') ?? ''}}</td>
                              <td class="align-middle d-flex">
                                <a href="{{ route('loanee.show', $loanee->id) }}" class="btn btn-success"><i class="la la-eye"></i></a>
                                <a href="{{ route('loanee.edit', $loanee->id) }}" class="btn btn-info mx-1"><i class="la la-edit"></i></a>
                                <form action="{{ route('loanee.destroy', $loanee->id) }}" method="post">
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
