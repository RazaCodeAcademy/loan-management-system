@extends('admin.layouts.master')

@section('title', 'Products')

@section('sub_title', 'All Products')

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
        <div class="content-header-right col-md-6 col-12">
          <div class="float-md-right">
            <a href="{{ route('products.create') }}" class="btn btn-primary round btn-glow px-2 text-white">Add Product</a>
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
                  <h4 class="card-title">All Products</h4>
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
                        @if (!empty($products))
                        @foreach ($products as $product)
                            <tr>
                              <td class="align-middle">{{ $product->id ?? ''}}</td>
                              <td class="align-middle">{{ $product->title ?? ''}}</td>
                              <td class="align-middle">{{ $product->description ?? ''}}</td>
                              <td class="align-middle">{{ $product->category->title ?? ''}}</td>
                              <td class="align-middle">
                                <img src="{{ $product->image ? asset($product->image) : ''}}" alt="{{ $product->title ?? ''}}" width="50">
                              </td>
                              <td class="align-middle">{{ ($product->discount.'%') ?? '0%'}}</td>
                              <td class="align-middle">{{ $product->price ?? '' }}</td>
                              <td class="align-middle">{{ $product->created_at->format('d-M-y') ?? ''}}</td>
                              <td class="align-middle">
                                @if($product->status!=1)
                                  <a href="{{ route('products.status', $product->id) }}" onclick="return confirm('Are you sure');"
                                    class="btn btn-danger btn-block">
                                    Approve	
                                  </a>	
                                @endif
                                @if($product->status==1)
                                  <a href="{{ route('products.status', $product->id) }}" onclick="return confirm('Are you sure');"
                                    class="btn btn-success btn-block">
                                    Reject	
                                  </a>
                                @endif
                              </td>
                              <td class="align-middle d-flex">
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info mx-1"><i class="la la-edit"></i></a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="post">
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
