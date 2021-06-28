@extends('layouts.master')

@section('title', $page->title ?? '')

@section('content')

    @section('css')

        <style>

            .page-container{
                margin: 25px 0px 25px 0px;
            }

            .page-container img{
                width: 100%;
            }

            .h2-border{
                border-bottom: solid 2px#FDA30E;
                margin-bottom: 15px;
            }

        </style>

    @endsection

	<!-- banner -->
	<div class="page-head">
		<div class="container">
			<h3>{{ $page->title ?? '' }}</h3>
		</div>
	</div>
	<!-- //banner -->
	<!-- pages -->
		<div class="container">
            <div class="page-container">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ $page->image ? asset($page->image ) : '' }}" alt="{{ $page->slug }}" class="w-100">
                    </div>
                    <div class="col-md-8">
                        <h2 class="h2-border">{{ $page->title }}</h2>
                        {{ $page->description }}
                    </div>
                </div>
            </div>
		</div>
		
	<!-- //pages -->
		
@endsection