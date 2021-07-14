@extends('layouts.frontend.master')

@section('content')

    <!-- Page Title Start -->
    <section class="page-title-section" style="@if (isset($breadcrumb)) background-image: url('{{ asset('uploads/img/general/'.$breadcrumb->breadcrumb_image) }}');
    @else background-image: url('{{ asset('uploads/common_dummy/1920x750.jpg') }}');
    @endif">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center">
                    <div class="page-title-content">
                        <h3 class="title text-white">{{ __('frontend.gallery') }}</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a  href="{{ url('/') }}">{{ __('frontend.home') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('frontend.gallery') }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Title End -->

    <!-- Portfolio Grid Animate Start -->
    @if (count($galleries) > 0)
        <section class="service-section pdt-110 pdt-lg-105 pdb-80">
            <div class="section-content">
                <div class="container">
                    <div class="row" id="portfolio-dark-grid-animate">
                        @foreach ($galleries as $gallery)
                            <div class="col-md-6 col-lg-4 portfolio-item wow fadeInUp" data-wow-delay="0.1s" data-tilt data-tilt-perspective="2000">
                                <div class="portfolio-item-inner">
                                    <div class="portfolio-item-img">
                                        <a data-fancybox="dark-grid-animate" href="{{ asset('uploads/img/galleries/'.$gallery->gallery_image) }}">
                                            <img src="{{ asset('uploads/img/galleries/'.$gallery->gallery_image) }}" alt="gallery image" class="img-fluid">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="service-section pdt-110 pdt-lg-105 pdb-80">
            <div class="section-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 mx-auto text-center">
                            <span>{{ __('frontend.updating') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- Portfolio Grid Animate End -->

@endsection
