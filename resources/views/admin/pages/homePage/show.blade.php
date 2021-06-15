@extends('admin.layouts.master')

@section('title', 'Sliders')

@section('sub_title', 'Show Slider')

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
      </div>
      <div class="content-body">
        
        <!-- Grid With Label start -->
        <section class="grid-with-label" id="grid-with-label">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-content collapse show">
                  <div class="card-body">
                    <h2 class="text-center my-1">{{ $slider->title }}</h2>
                    <hr>
                    <div class="row">
                      <div class="col-md-4">
                        <h2>Title : </h2>
                        <p>{{ $slider->title ?? '' }}</p>

                        <br>

                        <h2>Description : </h2>
                        <p>{{ $slider->description ?? '' }}</p>

                        <br>

                        <h2>Dated : </h2>
                        <p>{{ $slider->created_at->format('d-M-Y') ?? '' }}</p>
                      </div>
                      <div class="col-md-8">
                        <img class="w-100" src="{{ $slider->image ? asset($slider->image) : '' }}" alt="" height="500">
                      </div>
                    </div>
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
