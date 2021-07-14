@extends('layouts.frontend.master')

@section('content')

    <!-- Page Title Start -->
    <section class="page-title-section" style="
    @if($page->breadcrumb_image != '')  background-image: url('{{ asset('uploads/img/general/'.$page->breadcrumb_image) }}');
    @elseif (isset($breadcrumb)) background-image: url('{{ asset('uploads/img/general/'.$breadcrumb->breadcrumb_image) }}');
    @else background-image: url('{{ asset('uploads/common_dummy/1920x750.jpg') }}');
    @endif">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center">
                    <div class="page-title-content">
                        <h3 class="title text-white">{{ $page->page_title }}</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a  href="{{ url('/') }}">{{ __('frontend.home') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $page->page_title }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Title End -->

    <!-- Blog Single Start -->
    <section class="blog-single-news pdt-110 pdb-110">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="single-news-details news-wrapper">
                        <div class="single-news-content">
                           <div class="entry-content">
                                <p>@php echo html_entity_decode($page->desc); @endphp</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Single End -->

@endsection
