@extends('admin.layouts.master')

@section('title', 'Orders')

@section('sub_title', 'Show Order')

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
                  <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">@yield('title')</a>
                  </li>
                </ol>
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
                  <div class="card-content collapse show">
                    <div class="card-body card-dashboard">
                      <table class="table display nowrap table-striped table-bordered w-100" id="dtTable">
                        <thead class="w-100" style="width: 100%">
                          <tr>
                            <th class="sorting_desc">#</th>
                            <th>Title</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Product Price</th>
                            <th>Discount Price</th>
                            <th>Discount</th>
                            <th>Created At</th>
                          </tr>
                        </thead>
                          @if (!empty($orders))
                            @foreach ($orders as $order)
                              <tbody>
                                @php
                                  $total = 0;
                                  $count = count($order->cart->items);
                                @endphp
                                @foreach ($order->cart->items as $item)
                                  <tr>
                                    <td class="align-middle">{{ $loop->iteration ?? ''}}</td>
                                    <td class="align-middle">{{ $item['item']->title ?? ''}}</td>
                                    <td class="align-middle">{{ $item['qty'] ?? ''}}</td>
                                    <td class="align-middle">{{ $item['price'] ?? ''}}</td>
                                    <td class="align-middle">{{ $item['item']->price ?? ''}}</td>
                                    <td class="align-middle">{{ ($item['item']->price - ($item['item']->price * $item['item']->discount/100)) ?? ''}}</td>
                                    <td class="align-middle">{{ $item['item']->discount.'%' ?? ''}}</td>
                                    <td class="align-middle">{{ $order->created_at->format('d-M-y') ?? ''}}</td>
                                  </tr>
                                  @php
                                    $total += $item['price'];
                                  @endphp
                                  @if($loop->iteration == $count)
                                    <tfoot class="bg-info text-white">
                                      <th colspan="3" class="align-middle">OrderId : {{ $orderId ?? '' }}</th>
                                      <th colspan="5" class="align-middle text-right">Grand Total : {{ $total ?? '' }}</th>
                                    </tfoot>
                                  @endif
                                @endforeach
                              </tbody>
                            @endforeach
                          @endif
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
