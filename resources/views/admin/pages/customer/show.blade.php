@extends('admin.layouts.master')

@section('title', 'Customer')

@section('sub_title', 'Show Customer')

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
                <li class="breadcrumb-item"><a href="{{ route('customer.index') }}">@yield('title')</a>
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content-body">
        <!-- User Profile Cards with Cover Image -->
        <section id="user-profile-cards-with-cover-image" class="row mt-2">
          <div class="col-xl-8 offset-lg-2 offset-md-3 col-md-6 col-12">
            <div class="card profile-card-with-cover">
              <div class="card-img-top img-fluid bg-cover height-500" style="background: url({{ $customer->image ? asset($customer->image) : asset('/public/app-assets/images/carousel/18.jpg') }});"></div>
              <div class="profile-card-with-cover-content text-center">
                <div class="card-body">
                  <h4 class="card-title">{{ $customer->name ?? '' }}</h4>
                  <ul class="list-inline list-inline-pipe">
                    <li>@Email</li>
                    <li>{{ $customer->email ?? '' }}</li>
                  </ul>
                  <ul class="list-inline list-inline-pipe">
                    <li>Phone</li>
                    <li>{{ $customer->phone ?? '' }}</li>
                  </ul>
                  <ul class="list-inline list-inline-pipe">
                    <li>Address</li>
                    <li>{{ $customer->address ?? '' }}</li>
                  </ul>
                </div>
                <div class="text-center">
                  <a href="{{ route('agreement.create', $customer->id) }}" class="btn btn-outline-info mr-1 mb-1">
                    <span>Agreement</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!--/ User Profile Cards with Cover Image -->
      </div>
    </div>
  </div>
@endsection
