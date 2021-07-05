@extends('admin.layouts.master')

@section('title', 'Dashboard')

@section('content')

  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <!-- Revenue, Hit Rate & Deals -->
        <div class="row">
          <div class="col-lg-3 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h6 class="text-muted">Total Customers </h6>
                      <h3>{{ $customer ?? 0 }}</h3>
                    </div>
                    <div class="align-self-center">
                      <i class="la la-users success font-large-2 float-right"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h6 class="text-muted">Total Agreement</h6>
                      <h3>{{ $agreements ?? 0 }}</h3>
                    </div>
                    <div class="align-self-center">
                      <i class="icon-call-in danger font-large-2 float-right"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h6 class="text-muted">Total Orders</h6>
                      <h3>{{ $orders ?? 0 }}</h3>
                    </div>
                    <div class="align-self-center">
                      <i class="icon-trophy success font-large-2 float-right"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h6 class="text-muted">Total Amounts</h6>
                      <h3>Rs. {{ $amounts }}</h3>
                    </div>
                    <div class="align-self-center">
                      <i class="la la-money danger font-large-2 float-right"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--/ Revenue, Hit Rate & Deals -->
      </div>
    </div>
  </div>

@endsection