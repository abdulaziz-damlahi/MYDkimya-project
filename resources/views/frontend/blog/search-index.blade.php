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
                        <h3 class="title text-white">{{ __('frontend.search_results') }}</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a  href="{{ url('/') }}">{{ __('frontend.home') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('frontend.search_results') }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Title End -->

    <!-- Blog Grid Section Start -->
    @if (count($blogs) > 0)
        <section class="pdt-110 pdb-110">
            <div class="section-content">
                <div class="container">
                    <div class="row">
                        @foreach ($blogs as $blog)
                            <div class="col-md-6 col-lg-6 col-xl-4">
                                <div class="news-wrapper mrb-30 mrb-sm-40">
                                    <div class="news-thumb">
                                        @if (!empty($blog->blog_image))
                                            <img src="{{ asset('uploads/img/blogs/'.$blog->blog_image) }}" class="img-full" alt="blog image" >
                                        @else
                                            <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" class="img-full" alt="blog image">
                                        @endif
                                        <div class="news-top-meta">
                                            <span class="entry-category">{{ $blog->category->category_name }}</span>
                                        </div>
                                    </div>
                                    <div class="news-details">
                                        <div class="news-description mb-20">
                                            <h4 class="the-title mrb-30"><a href="{{ url('blog/'.$blog->slug) }}">{{ $blog->title }}</a></h4>
                                            <div class="news-bottom-meta">
                                                <span class="entry-date mrr-20"><i class="far fa-calendar-alt mrr-10 text-primary-color"></i>{{ Carbon\Carbon::parse($blog->created_at)->isoFormat('DD') }} {{ Carbon\Carbon::parse($blog->created_at)->isoFormat('MMM') }} {{ Carbon\Carbon::parse($blog->created_at)->isoFormat('GGGG') }}</span>
                                                <span class="entry-author"><i class="far fa-user mrr-10 text-primary-color"></i>@if (!empty($blog->author)) {{ $blog->author }} @else {{ __('frontend.admin') }} @endif</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="pdt-110 pdb-110 minus-mrb-30">
            <div class="section-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="news-sidebar-widget">
                                <div class="widget sidebar-widget widget-search">
                                    <h5 class="inner-header-title mrb-15">{{ __('frontend.nothing_found') }}</h5>
                                    <form class="search-form" action="{{ route('blog-page.search') }}" method="POST">
                                        @csrf
                                        <label>
                                            <input type="text" name="search" placeholder="{{ __('frontend.search_here') }}" class="search-field" required>
                                        </label>
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- Blog Grid Section End -->

@endsection
