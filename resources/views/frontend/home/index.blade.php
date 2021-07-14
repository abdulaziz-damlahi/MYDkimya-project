<!DOCTYPE html>
<html dir="@if (session()->has('language_direction_from_dropdown')) @if(session()->get('language_direction_from_dropdown') == 1) {{ __('rtl') }} @else {{ __('ltr') }} @endif @else {{ __('ltr') }} @endif" lang="@if (session()->has('language_code_from_dropdown')){{ str_replace('_', '-', session()->get('language_code_from_dropdown')) }}@else{{ str_replace('_', '-',   $language->language_code) }}@endif">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="@if (isset($general_seo)){{ $general_seo->site_name }} @endif">
    <meta name="description" content="@if (isset($general_seo)){{ $general_seo->site_desc }} @endif">
    <meta name="keywords" content="@if (isset($general_seo)){{ $general_seo->site_keywords }} @endif">
    <meta name="author" content="simsiyeka">
    <meta property="fb:app_id" content="@if (isset($general_seo)){{ $general_seo->fb_app_id }} @endif">
    <meta property="og:title" content="@if (isset($general_seo)){{ $general_seo->site_name }} @endif">
    <meta property="og:url" content="@if (isset($general_seo)){{ url()->current() }} @endif">
    <meta property="og:description" content="@if (isset($general_seo)){{ $general_seo->site_desc }} @endif">
    <meta property="og:image" content="@if (!empty($general_site_image->favicon_image)){{ asset('uploads/img/general/'.$general_site_image->favicon_image) }} @endif">
    <meta itemprop="image" content="@if (!empty($general_site_image->favicon_image)){{ asset('uploads/img/general/'.$general_site_image->favicon_image) }} @endif">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="@if (!empty($general_site_image->favicon_image)){{ asset('uploads/img/general/'.$general_site_image->favicon_image) }} @endif">
    <meta property="twitter:title" content="@if (isset($general_seo)){{ $general_seo->site_name }} @endif">
    <meta property="twitter:description" content="@if (isset($general_seo)){{ $general_seo->site_desc }} @endif">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>{{ __('frontend.home') }} @if (isset($general_seo)) - {{ $general_seo->site_name }} @endif</title>

@if (!empty($general_site_image->favicon_image))
    <!-- Favicon -->
        <link href="{{ asset('uplods/img/general/'.$general_site_image->favicon_image) }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
        <link href="{{ asset('uploads/img/general/'.$general_site_image->favicon_image) }}" sizes="128x128" rel="shortcut icon" />
@else
    <!-- Favicon -->
        <link href="{{ asset('uplods/img/dummy/favicon.png') }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
        <link href="{{ asset('uploads/img/dummy/favicon.png') }}" sizes="128x128" rel="shortcut icon" />
@endif


<!-- Theme Css -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/responsive.css') }}">

    <!-- Dynamic Css -->
    <style>
        @if (!empty($site_info->address) && empty($site_info->email))
            .header-top-area .header-top-left-part .address:after
        {
            display: none;
        }
        @endif
    </style>

@if (isset($google_analytic))
    <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $google_analytic->google_analytic }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', '{{ $google_analytic->google_analytic }}');
        </script>
    @endif

</head>
<body>

@if ($section_arr['preloader'] == 1)
    <!-- Preloader Start -->
    <div class="preloader"></div>
    <!-- Preloader End -->
@endif

<!-- header Start -->
<header class="header-style-two" data-scroll-index="0">
    <div class="header-wrapper">
        <div class="header-top-area bg-gradient-color d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 header-top-left-part">
                        @if (!empty($site_info->address)) <span class="address" data-toggle="tooltip" data-placement="top" title="{{ $site_info->address }}"><i class="webexflaticon flaticon-placeholder-1"></i> {{ \Illuminate\Support\Str::limit($site_info->address, 30, $end='...') }}</span> @endif
                        @if (!empty($site_info->email)) <span class="phone"><i class="webexflaticon flaticon-send"></i> {{ $site_info->email }}</span> @endif
                    </div>
                    <div class="col-lg-6 header-top-right-part text-right">
                        <ul class="social-links">
                            @foreach($socials as $social)
                                <li><a href="{{ $social->link }}" target="_blank"><i class="{{ $social->social_media }}"></i></a></li>
                            @endforeach
                        </ul>
                        @if (count($display_dropdowns) > 0)
                            <div class="language">
                                <a class="language-btn" href="#"><i class="webexflaticon flaticon-internet"></i>
                                    @if (session()->has('language_name_from_dropdown')) {{ session()->get('language_name_from_dropdown') }} @else {{ $language->language_name }} @endif
                                </a>
                                <ul class="language-dropdown">
                                    @foreach ($display_dropdowns as $display_dropdown)
                                        <li><a href="{{ url('language/set-locale/'.$display_dropdown->id) }}">{{ $display_dropdown->language_name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="header-navigation-area two-layers-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <a class="navbar-brand logo f-left mrt-10 mrt-md-0" href="{{ url('/') }}">
                            @if (!empty($general_site_image->site_white_logo_image))
                                <img id="logo-image" class="img-center" src="{{ asset('uploads/img/general/'.$general_site_image->site_white_logo_image) }}" alt="logo image">
                            @else
                                <img id="logo-image" class="img-center" src="{{ asset('uploads/common_dummy/logo.png') }}" alt="logo image">
                            @endif
                        </a>
                        <div class="mobile-menu-right"></div>
                        <div class="header-searchbox-style-two d-none d-xl-block">
                            <div class="side-panel side-panel-trigger text-right d-none d-lg-block">
                                <span class="bar1"></span>
                                <span class="bar2"></span>
                                <span class="bar3"></span>
                            </div>
                            <div class="show-searchbox">
                                <a href="#"><i class="webex-icon-Search"></i></a>
                            </div>
                            <div class="toggle-searchbox">
                                <form id="searchform-all" action="{{ route('blog-page.search') }}" method="POST">
                                    @csrf
                                    <div>
                                        <input type="text" id="s" class="form-control" name="search" placeholder="{{ __('frontend.search') }}" required>
                                        <div class="input-box">
                                            <button type="submit" id="searchsubmit"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="side-panel-content">
                            <div class="close-icon">
                                <button><i class="webex-icon-cross"></i></button>
                            </div>
                            <div class="side-panel-logo mrb-30">
                                <a href="{{ url('/') }}">
                                @if (!empty($general_site_image->site_white_logo_image))
                                    <img src="{{ asset('uploads/img/general/'.$general_site_image->site_white_logo_image) }}" alt="logo image">
                                @else
                                    <img src="{{ asset('uploads/common_dummy/logo.png') }}" alt="logo image">
                                @endif
                                </a>
                            </div>
                            <div class="side-info mrb-30">
                                <div class="side-panel-element mrb-25">
                                    <h4 class="mrb-10">{{ __('frontend.office_address') }}</h4>
                                    <ul class="list-items">
                                        @if (!empty($site_info->address)) <li><span class="fa fa-map-marker-alt mrr-10 text-primary-color"></span><a href="@if (!empty($site_info->address_map_link)) {{ $site_info->address_map_link }} @else # @endif">{{ $site_info->address }}</a></li> @endif
                                        @if (!empty($site_info->email)) <li><span class="fas fa-envelope mrr-10 text-primary-color"></span>{{ $site_info->email }}</li> @endif
                                        @if (!empty($site_info->phone)) <li><span class="fas fa-phone-alt mrr-10 text-primary-color"></span>{{ $site_info->phone }}</li> @endif
                                    </ul>
                                </div>
                            </div>
                            <h4 class="mrb-15">{{ __('frontend.social_list') }}</h4>
                            <ul class="social-list">
                                @foreach ($socials as $social)
                                    <li><a href="@if (!empty($social->link)) {{ $social->link }} @else # @endif"><i class="{{ $social->social_media }}"></i></a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="main-menu f-right">
                            <nav id="mobile-menu-right">
                                <ul class="one-pagenav">
                                    <li><a href="#home" data-scroll-nav="0">{{ __('frontend.home') }}</a></li>
                                    @if ($section_arr['about_section'] == 1) <li><a href="#about" data-scroll-nav="1">{{ __('frontend.about') }}</a></li> @endif
                                    @if ($section_arr['service_section'] == 1) <li><a href="#service" data-scroll-nav="2">{{ __('frontend.services') }}</a></li> @endif
                                    @if ($section_arr['project_section'] == 1) <li><a href="#case-study" data-scroll-nav="4">{{ __('frontend.projects') }}</a></li> @endif
                                    @if ($section_arr['blog_section'] == 1) <li><a href="#news" data-scroll-nav="5">{{ __('frontend.news') }}</a></li> @endif
                                    @if ($section_arr['page_menu'] == 1)
                                        <li class="has-sub right-view">
                                            <a href="#">{{ __('frontend.pages') }}</a>
                                            <ul class="sub-menu">
                                                @if ($section_arr['team_section'] == 1) <li><a href="#team" data-scroll-nav="3">{{ __('frontend.teams') }}</a></li> @endif
                                                @if ($section_arr['gallery_section'] == 1) <li><a href="{{ url('gallery') }}">{{ __('frontend.gallery') }}</a></li> @endif
                                                @foreach ($pages as $page)
                                                    @if ($page->display_footer_menu != 1)
                                                        <li><a href="{{ url('page/'.$page->page_slug) }}">{{ $page->page_title }}</a></li>
                                                    @endif
                                                @endforeach
                                                @php unset($page); @endphp
                                            </ul>
                                        </li>
                                    @endif
                                    @if ($section_arr['contact_section'] == 1) <li><a href="#contact" data-scroll-nav="6">{{ __('frontend.contact') }}</a></li> @endif
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header End -->

<!-- Home Slider Start -->
@if (count($sliders) > 0)
    <section id="home" class="banner-section">
        <div class="home-carousel owl-theme owl-carousel">
            @foreach ($sliders as $slider)
                <div class="slide-item">
                    <div class="image-layer" data-background="{{ asset('uploads/img/sliders/'.$slider->slider_image) }}"></div>
                    <div class="auto-container">
                        <div class="row clearfix">
                            <div class="col-xl-8 col-lg-12 col-md-12 content-column">
                                <div class="content-box">
                                    <h1>{{ $slider->title }}</h1>
                                    <p>{{ $slider->desc }}</p>
                                    @if (!empty($slider->btn_name))
                                        <div class="btn-box">
                                            <a href="@if (!empty($slider->btn_link)) {{ $slider->btn_link }} @else # @endif" class="cs-btn-one btn-gradient-color">{{ $slider->btn_name }}</a>
                                        </div>
                                    @elseif (empty($slider->btn_name) && empty($slider->btn_link) && $section_arr['contact_section'] == 1)
                                        <div class="btn-box">
                                            <a href="#contact" data-scroll-nav="6" class="cs-btn-one btn-gradient-color">{{ __('frontend.contact_us') }}</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@else
    <section id="home" class="banner-section">
        <div class="home-carousel owl-theme owl-carousel">
            <div class="slide-item">
                <div class="image-layer" data-background="{{ asset('uploads/common_dummy/1920x1080.jpg') }}"></div>
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-xl-8 col-lg-12 col-md-12 content-column">
                            <div class="content-box">
                                <h1>Make a Good Plan & <br> Grow Your Business</h1>
                                <p>We have almost 35+ years of experience for <br>providing consulting services solutions</p>
                                <div class="btn-box">
                                    <a href="#" class="cs-btn-one btn-gradient-color">Get a Quote</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide-item">
                <div class="image-layer" data-background="{{ asset('uploads/common_dummy/1920x1080.jpg') }}"></div>
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-xl-8 col-lg-12 col-md-12 content-column">
                            <div class="content-box">
                                <h1>Make a Good Plan & <br> Grow Your Business</h1>
                                <p>We have almost 35+ years of experience for <br>providing consulting services solutions</p>
                                <div class="btn-box">
                                    <a href="#" class="cs-btn-one btn-gradient-color">Get a Quote</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
<!-- Home Slider End -->

<!-- Feature Section Start -->
@if ($section_arr['feature_section'] == 1)
    @if (count($features) > 0)
        <section class="feature-section pdt-110 pdb-130 bg-silver-light bg-no-repeat" data-background="{{ asset('assets/frontend/images/bg/abs-bg5.png') }}">
            <div class="container">
                <div class="row">
                    @foreach ($features as $feature)
                        <div class="col-md-6 col-xl-4">
                            <div class="feature-box mrb-lg-60 @if (count($features) > 3) custom-mb-30 @endif">
                                @if (!empty($feature->feature_image))
                                    <div class="feature-thumb">
                                        <img class="img-full" src="{{ asset('uploads/img/features/'.$feature->feature_image) }}" alt="feature image">
                                    </div>
                                @endif
                                <div class="feature-content">
                                    @if (!empty($feature->title))
                                        <div class="title">
                                            <h3>{{ $feature->title }}</h3>
                                        </div>
                                    @endif
                                    @if (!empty($feature->desc))
                                        <div class="para">
                                            <p>{{ $feature->desc }}</p>
                                        </div>
                                    @endif
                                    @if (!empty($feature->btn_link))
                                        <div class="link">
                                            <a href="{{ $feature->btn_link }}"><i class="fas fa-long-arrow-alt-right"></i></a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @else
        <section class="feature-section pdt-110 pdb-130 bg-silver-light bg-no-repeat" data-background="{{ asset('assets/frontend/images/bg/abs-bg5.png') }}">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-xl-4">
                        <div class="feature-box mrb-lg-60">
                            <div class="feature-thumb">
                                <img class="img-full" src="{{ asset('uploads/common_dummy/375x250.jpg') }}" alt="feature image">
                            </div>
                            <div class="feature-content">
                                <div class="title">
                                    <h3>Creative Design</h3>
                                </div>
                                <div class="para">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est amet similique ipsum reprehenderit sed.</p>
                                </div>
                                <div class="link">
                                    <a href="#"><i class="fas fa-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="feature-box mrb-lg-60">
                            <div class="feature-thumb">
                                <img class="img-full" src="{{ asset('uploads/common_dummy/375x250.jpg') }}" alt="feature image">
                            </div>
                            <div class="feature-content">
                                <div class="title">
                                    <h3>Complete Analysis</h3>
                                </div>
                                <div class="para">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est amet similique ipsum reprehenderit sed.</p>
                                </div>
                                <div class="link">
                                    <a href="#"><i class="fas fa-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="feature-box">
                            <div class="feature-thumb">
                                <img class="img-full" src="{{ asset('uploads/common_dummy/375x250.jpg') }}" alt="feature image">
                            </div>
                            <div class="feature-content">
                                <div class="title">
                                    <h3>Optimal Solution</h3>
                                </div>
                                <div class="para">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est amet similique ipsum reprehenderit sed.</p>
                                </div>
                                <div class="link">
                                    <a href="#"><i class="fas fa-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endif
<!-- Feature Section End -->

<!-- About Section Start -->
@if ($section_arr['about_section'] == 1)
    @if (isset($about))
        <section id="about" class="about-section anim-object pdt-110 pdb-110 pdb-lg-80" data-scroll-index="1">
            <div class="container">
                <div class="row align-items-center">
                    @if (!empty($about->about_image))
                        <div class="col-md-12 col-xl-6">
                            <div class="about-image-block mrb-lg-60">
                                <img class="img-full" src="{{ asset('uploads/img/about/'.$about->about_image) }}" alt="about image">
                            </div>
                        </div>
                    @endif
                    <div class="col-md-12 col-xl-6">
                        <h2 class="title-under-line mrb-70">{{ $about->title }}</h2>
                        <p>@php echo html_entity_decode($about->desc); @endphp</p>
                        @if (!empty($about->btn_name))
                            <a href="@if (!empty($about->btn_link)) {{ $about->btn_link }} @else # @endif" class="cs-btn-one btn-gradient-color btn-lg">{{ $about->btn_name }}</a>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @else
        <section id="about" class="about-section anim-object pdt-110 pdb-110 pdb-lg-80" data-scroll-index="1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-12 col-xl-6">
                        <div class="about-image-block mrb-lg-60">
                            <img class="img-full" src="{{ asset('uploads/common_dummy/575x645.jpg') }}" alt="about image">
                        </div>
                    </div>
                    <div class="col-md-12 col-xl-6">
                        <h2 class="title-under-line mrb-70">We have 32+ Years Business Experiences</h2>
                        <h5 class="mrb-30 text-primary-color">Trusted Business Consulting Service Provider</h5>
                        <p class="mrb-40">Distinctively exploit optimal alignments for intuitive. Quickly coordinate business applications through revolutionary catalysts for chang the Seamlessly optimal testing procedures whereas processes. Synerg stically evolve 2.0 technologies rather than just in web & apps development optimal alignments for intuitive.</p>
                        <a href="#" class="cs-btn-one btn-gradient-color btn-lg">Read More</a>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endif
<!-- About Section End -->

<!-- About Section End -->
@if ($section_arr['counter_section'] == 1)
    @if (count($counters) > 0)
        <section id="about" class="about-section minus-mrb-30">
            <div class="container">
                <div class="row mrt-0 mrb-110">
                    @foreach ($counters as $counter)
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="funfact mrb-30">
                                @if (!empty($counter->icon))
                                    <div class="icon">
                                        <span class="{{ $counter->icon }}"></span>
                                    </div>
                                @endif
                                <h2 class="counter">{{ $counter->timer }}</h2>
                                <h5 class="title">{{ $counter->desc }}</h5>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @else
        <section id="about" class="about-section minus-mrb-30">
            <div class="container">
                <div class="row mrt-0 mrb-110">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="funfact mrb-30">
                            <div class="icon">
                                <span class="webexflaticon flaticon-man-2"></span>
                            </div>
                            <h2 class="counter">1450</h2>
                            <h5 class="title">Happy Customers</h5>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="funfact mrb-lg-30 mrb-60">
                            <div class="icon">
                                <span class="webexflaticon flaticon-like-3"></span>
                            </div>
                            <h2 class="counter">1864</h2>
                            <h5 class="title">Peoples Likes</h5>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="funfact mrb-lg-30 mrb-60">
                            <div class="icon">
                                <span class="webexflaticon flaticon-trophy-1"></span>
                            </div>
                            <h2 class="counter">1280</h2>
                            <h5 class="title">Awards Achieved</h5>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="funfact mrb-lg-30 mrb-60">
                            <div class="icon">
                                <span class="webexflaticon flaticon-briefcase-1"></span>
                            </div>
                            <h2 class="counter">32</h2>
                            <h5 class="title">Experiences</h5>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endif
<!-- About Section End -->

<!-- Service Section Start -->
@if ($section_arr['service_section'] == 1)
    @if (isset($service_section) || count($services) > 0)
        <section id="service" class="serivce-section bg-silver-light pdt-110 pdb-80" data-background="{{ asset('assets/frontend/images/bg/abs-bg7.png') }}" data-scroll-index="2">
            @if (isset($service_section))
                <div class="section-title">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="section-title-left-part mrb-sm-30">
                                    @if (!empty($service_section->top_title))
                                        <div class="section-left-sub-title mb-20">
                                            <h5 class="sub-title text-primary-color">{{ $service_section->top_title }}</h5>
                                        </div>
                                    @endif
                                    <h2 class="title">{{ $service_section->title }}</h2>
                                </div>
                            </div>
                            <div class="offset-lg-1 col-lg-6">
                                <div class="section-title-right-part">
                                    @if (!empty($service_section->desc)) <p>{{ $service_section->desc }}</p> @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="section-content">
                <div class="container">
                    <div class="row">
                        @foreach ($services as $service)
                            <div class="col-md-6 col-xl-3">
                                <div class="service-box">
                                    @if (!empty($service->icon))
                                        <div class="service-icon">
                                            <span class="{{ $service->icon }}"></span>
                                        </div>
                                    @endif
                                    <div class="service-content">
                                        @if (!empty($service->title))
                                            <div class="title">
                                                <h3>{{ $service->title }}</h3>
                                            </div>
                                        @endif
                                        @if (!empty($service->desc))
                                            <div class="para">
                                                <p>{{ $service->desc }}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @else
        <section id="service" class="serivce-section bg-silver-light pdt-110 pdb-80" data-background="{{ asset('assets/frontend/images/bg/abs-bg7.png') }}" data-scroll-index="2">
            <div class="section-title">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="section-title-left-part mrb-sm-30">
                                <div class="section-left-sub-title mb-20">
                                    <h5 class="sub-title text-primary-color">Service We Offer</h5>
                                </div>
                                <h2 class="title">Our Services</h2>
                            </div>
                        </div>
                        <div class="offset-lg-1 col-lg-6">
                            <div class="section-title-right-part">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos aperiam porro necessitatibus, consequuntur, reiciendis dolore doloribus id repellendus tempora vitae quia voluptas ipsum eligendi hic.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-xl-3">
                            <div class="service-box">
                                <div class="service-icon">
                                    <span class="webexflaticon flaticon-plan"></span>
                                </div>
                                <div class="service-content">
                                    <div class="title">
                                        <a href="#"><h3>Online Business</h3></a>
                                    </div>
                                    <div class="para">
                                        <p>We always provide people a complete solution focused of any business.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="service-box">
                                <div class="service-icon">
                                    <span class="webexflaticon flaticon-meeting"></span>
                                </div>
                                <div class="service-content">
                                    <div class="title">
                                        <a href="#"><h3>Human Resource</h3></a>
                                    </div>
                                    <div class="para">
                                        <p>We always provide people a complete solution focused of any business.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="service-box">
                                <div class="service-icon">
                                    <span class="webexflaticon flaticon-growth"></span>
                                </div>
                                <div class="service-content">
                                    <div class="title">
                                        <a href="#"><h3>Market Research</h3></a>
                                    </div>
                                    <div class="para">
                                        <p>We always provide people a complete solution focused of any business.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="service-box">
                                <div class="service-icon">
                                    <span class="webexflaticon flaticon-benchmark"></span>
                                </div>
                                <div class="service-content">
                                    <div class="title">
                                        <a href="#"><h3>Business Strategy</h3></a>
                                    </div>
                                    <div class="para">
                                        <p>We always provide people a complete solution focused of any business.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="service-box">
                                <div class="service-icon">
                                    <span class="webexflaticon flaticon-search-1"></span>
                                </div>
                                <div class="service-content">
                                    <div class="title">
                                        <a href="#"><h3>Project Managment</h3></a>
                                    </div>
                                    <div class="para">
                                        <p>We always provide people a complete solution focused of any business.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="service-box">
                                <div class="service-icon">
                                    <span class="webexflaticon flaticon-wallet"></span>
                                </div>
                                <div class="service-content">
                                    <div class="title">
                                        <a href="#"><h3>Money Management</h3></a>
                                    </div>
                                    <div class="para">
                                        <p>We always provide people a complete solution focused of any business.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="service-box">
                                <div class="service-icon">
                                    <span class="webexflaticon flaticon-profits"></span>
                                </div>
                                <div class="service-content">
                                    <div class="title">
                                        <a href="#"><h3>Online Marketing</h3></a>
                                    </div>
                                    <div class="para">
                                        <p>We always provide people a complete solution focused of any business.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="service-box">
                                <div class="service-icon">
                                    <span class="webexflaticon flaticon-medal-1"></span>
                                </div>
                                <div class="service-content">
                                    <div class="title">
                                        <a href="#"><h3>Business Insurance</h3></a>
                                    </div>
                                    <div class="para">
                                        <p>We always provide people a complete solution focused of any business.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endif
<!-- Service Section End -->

@if ($section_arr['team_section'] == 1)
    @if (isset($team_section) || count($teams) > 0)
        <!-- Team Section Title Start -->
        <section id="team" class="pdt-110 @if (count($teams) > 0) pdb-150 @else pdb-50 @endif section-white-typo" data-background="@if (!empty($team_section->bg_image)) {{ asset('uploads/img/teams/'.$team_section->bg_image) }} @endif" data-overlay-dark="8" data-scroll-index="3">
            <div class="section-title text-center wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                <div class="container">
                    <div class="row">
                        <div class="col"></div>
                        <div class="col-lg-8 col-xl-6">
                            <div class="section-title-block">
                                @if (!empty($team_section->title)) <h5 class="text-primary-color anim-box-objects line-both-side mrb-15">{{ $team_section->title }}</h5> @endif
                                @if (!empty($team_section->desc)) <h2>{{ $team_section->desc }}</h2> @endif
                            </div>
                        </div>
                        <div class="col"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Team Section Title End -->
        <!-- Team Section Start -->
        @if (count($teams) > 0)
            <section class="pdt-0 pdb-110 pdb-md-110 minus-mrt-130 bg-pos-center-bottom minus-mrb-30">
                <div class="section-content">
                    <div class="container">
                        <div class="row">
                            @foreach ($teams as $team)
                                <div class="col-md-6 col-lg-6 col-xl-3">
                                    <div class="team-block mrb-30">
                                        @if (!empty($team->team_image))
                                            <div class="team-upper-part">
                                                <img class="img-full" src="{{ asset('uploads/img/teams/'.$team->team_image) }}" alt="team image">
                                            </div>
                                        @endif
                                        <div class="team-bottom-part">
                                            @if (!empty($team->name)) <h4 class="team-title mrb-5"><a href="#0">{{ $team->name }}</a></h4> @endif
                                            @if (!empty($team->job)) <h6 class="designation">{{ $team->job }}</h6> @endif
                                            <ul class="social-list vertical-style list-sm">
                                                @if (!empty($team->link_1)) <li><a href="@if (!empty($team->link_1)) @else # @endif"><i class="fab fa-facebook-f"></i></a></li> @endif
                                                @if (!empty($team->link_2)) <li><a href="@if (!empty($team->link_2)) @else # @endif"><i class="fab fa-twitter"></i></a></li> @endif
                                                @if (!empty($team->link_3)) <li><a href="@if (!empty($team->link_3)) @else # @endif"><i class="fab fa-instagram"></i></a></li> @endif
                                                @if (!empty($team->link_4)) <li><a href="@if (!empty($team->link_4)) @else # @endif"><i class="fab fa-linkedin"></i></a></li> @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <!-- Team Section End -->
    @else
        <!-- Team Section Title Start -->
        <section id="team" class="pdt-110 pdb-150 section-white-typo" data-background="{{ asset('uploads/common_dummy/1920x450.jpg') }}" data-overlay-dark="8" data-scroll-index="3">
            <div class="section-title text-center wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                <div class="container">
                    <div class="row">
                        <div class="col"></div>
                        <div class="col-lg-8 col-xl-6">
                            <div class="section-title-block">
                                <h5 class="text-primary-color anim-box-objects line-both-side mrb-15">Meet Our Team</h5>
                                <h2>We Have a Professional Consulting Team</h2>
                            </div>
                        </div>
                        <div class="col"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Team Section Title End -->

        <!-- Team Section Start -->
        <section class="pdt-0 pdb-110 pdb-md-110 minus-mrt-130 bg-pos-center-bottom minus-mrb-30">
            <div class="section-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="team-block mrb-30">
                                <div class="team-upper-part">
                                    <img class="img-full" src="{{ asset('uploads/common_dummy/270x285.jpg') }}" alt="team image">
                                </div>
                                <div class="team-bottom-part">
                                    <h4 class="team-title mrb-5"><a href="#">Jack Mehoff</a></h4>
                                    <h6 class="designation">Engineer</h6>
                                    <ul class="social-list vertical-style list-sm">
                                        <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="team-block mrb-30">
                                <div class="team-upper-part">
                                    <img class="img-full" src="{{ asset('uploads/common_dummy/270x285.jpg') }}" alt="team image">
                                </div>
                                <div class="team-bottom-part">
                                    <h4 class="team-title mrb-5"><a href="#">Jack Mehoff</a></h4>
                                    <h6 class="designation">Engineer</h6>
                                    <ul class="social-list vertical-style list-sm">
                                        <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="team-block mrb-30">
                                <div class="team-upper-part">
                                    <img class="img-full" src="{{ asset('uploads/common_dummy/270x285.jpg') }}" alt="team image">
                                </div>
                                <div class="team-bottom-part">
                                    <h4 class="team-title mrb-5"><a href="#">Jack Mehoff</a></h4>
                                    <h6 class="designation">Engineer</h6>
                                    <ul class="social-list vertical-style list-sm">
                                        <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="team-block mrb-30">
                                <div class="team-upper-part">
                                    <img class="img-full" src="{{ asset('uploads/common_dummy/270x285.jpg') }}" alt="team image">
                                </div>
                                <div class="team-bottom-part">
                                    <h4 class="team-title mrb-5"><a href="#">Jack Mehoff</a></h4>
                                    <h6 class="designation">Engineer</h6>
                                    <ul class="social-list vertical-style list-sm">
                                        <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Team Section End -->
    @endif
@endif

<!-- Skill Section Start -->
@if ($section_arr['skill_section'] == 1)
    @if (isset($skill_section) || count($skills) > 0)
        <section class="pdt-110 pdb-110 pdb-md-110 bg-pos-center-bottom"  data-background="{{ asset('assets/frontend/images/bg/abs-bg1.png') }}">
            <div class="section-content">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-12 @if (!empty($skill_section->skill_image)) col-xl-6 @else col-xl-12 @endif">
                            @if (!empty($skill_section->top_title)) <h5 class="mrb-15 text-primary-color sub-title-side-line">{{ $skill_section->top_title }}</h5> @endif
                            @if (!empty($skill_section->title)) <h2 class="mrb-30">{{ $skill_section->title }}</h2> @endif
                            @if (!empty($skill_section->desc)) <p class="mrb-30">{{ $skill_section->desc }}</p> @endif
                            @if (count($skills) > 0)
                                <div class="skills mrb-lg-60">
                                    @foreach ($skills as $skill)
                                        <div class="skill-item">
                                            <div class="skill-header">
                                                <h6 class="skill-title">{{ $skill->title }}</h6>
                                                <div class="skill-percentage">
                                                    <div class="count-box"><span class="count-text" data-speed="2100" data-stop="{{ $skill->percent_rate }}">0</span>%</div>
                                                </div>
                                            </div>
                                            <div class="skill-bar">
                                                <div class="bar-inner">
                                                    <div class="bar progress-line" data-width="{{ $skill->percent_rate }}"></div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        @if (!empty($skill_section->skill_image))
                            <div class="col-md-12 col-xl-6">
                                <div class="about-image-block">
                                    <img class="img-full" src="{{ asset('uploads/img/skill/'.$skill_section->skill_image) }}" alt="skill image">
                                    @if (!empty($site_info->phone))
                                        <div class="call-us-now">
                                            <p class="call-us-title mrb-5 text-white">{{ __('frontend.call_us_now') }}</p>
                                            <h3 class="number mrt-0 text-white">{{ $site_info->phone }}</h3>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="pdt-110 pdb-110 pdb-md-110 bg-pos-center-bottom"  data-background="{{ asset('assets/frontend/images/bg/abs-bg1.png') }}">
            <div class="section-content">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-12 col-xl-6">
                            <h5 class="mrb-15 text-primary-color sub-title-side-line">Professional Skills</h5>
                            <h2 class="mrb-30">We Help You to Grow <br><span class="f-weight-400">Your Business</span> Quickly</h2>
                            <p class="mrb-30">Distinctively exploit optimal alignments for intuitive. Quickly coordinate business applications through revolutionary cataly technologies rather than development optimal alignments for intuitive.</p>
                            <div class="skills mrb-lg-60">
                                <div class="skill-item">
                                    <div class="skill-header">
                                        <h6 class="skill-title">Business Consulting</h6>
                                        <div class="skill-percentage">
                                            <div class="count-box"><span class="count-text" data-speed="2100" data-stop="85">0</span>%</div>
                                        </div>
                                    </div>
                                    <div class="skill-bar">
                                        <div class="bar-inner">
                                            <div class="bar progress-line" data-width="85"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="skill-item">
                                    <div class="skill-header">
                                        <h6 class="skill-title">Market Analysis</h6>
                                        <div class="skill-percentage">
                                            <div class="count-box"><span class="count-text" data-speed="2000" data-stop="96">0</span>%</div>
                                        </div>
                                    </div>
                                    <div class="skill-bar">
                                        <div class="bar-inner">
                                            <div class="bar progress-line" data-width="96"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="skill-item">
                                    <div class="skill-header">
                                        <h6 class="skill-title">Money Management</h6>
                                        <div class="skill-percentage">
                                            <div class="count-box"><span class="count-text" data-speed="1900" data-stop="90">0</span>%</div>
                                        </div>
                                    </div>
                                    <div class="skill-bar">
                                        <div class="bar-inner">
                                            <div class="bar progress-line" data-width="90"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="skill-item">
                                    <div class="skill-header">
                                        <h6 class="skill-title">Business Growth</h6>
                                        <div class="skill-percentage">
                                            <div class="count-box"><span class="count-text" data-speed="1800" data-stop="88">0</span>%</div>
                                        </div>
                                    </div>
                                    <div class="skill-bar">
                                        <div class="bar-inner">
                                            <div class="bar progress-line" data-width="88"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-xl-6">
                            <div class="about-image-block">
                                <img class="img-full" src="{{ asset('uploads/common_dummy/575x645.jpg') }}" alt="skill image">
                                <div class="call-us-now">
                                    <p class="call-us-title mrb-5 text-white">Call Us Now</p>
                                    <h3 class="number mrt-0 text-white">+01 225 445</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endif
<!-- Skill Section End -->

<!-- Case Study Section Start -->
@if ($section_arr['project_section'] == 1)
    @if (isset($project_section) || count($projects) > 0)
        <section id="case-study" class="case-study-section anim-object2 pdt-110 pdb-110" data-scroll-index="4">
            @if (isset($project_section))
                <div class="section-title">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="section-title-left-part mrb-sm-30">
                                    @if (!empty($project_section->top_title))
                                        <div class="section-left-sub-title mb-20">
                                            <h5 class="sub-title text-primary-color">{{ $project_section->top_title }}</h5>
                                        </div>
                                    @endif
                                    <h2 class="title">{{ $project_section->title }}</h2>
                                </div>
                            </div>
                            <div class="offset-lg-1 col-lg-6">
                                <div class="section-title-right-part">
                                    @if (!empty($project_section->desc)) <p>{{ $project_section->desc }}</p> @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if (count($projects) > 0)
                <div class="section-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="owl-carousel project-items-4col long-gap-left">
                                @foreach ($projects as $project)
                                    <div class="case-study-item">
                                        <div class="case-study-thumb">
                                            @if (!empty($project->project_image)) <img class="img-full" src="{{ asset('uploads/img/projects/'.$project->project_image) }}" alt="project image"> @else <img class="img-full" src="{{ asset('uploads/common_dummy/project.jpg') }}" alt="project image"> @endif
                                            <div class="case-study-details p-4">
                                                @if (!empty($project->title)) <h4 class="case-study-category side-line mrb-5">{{ $project->title }}</h4> @endif
                                                @if (!empty($project->desc)) <h6 class="case-study-title">{{ $project->desc }}</h6> @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </section>
    @else
        <section id="case-study" class="case-study-section anim-object2 pdt-110 pdb-110" data-scroll-index="4">
            <div class="section-title">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="section-title-left-part mrb-sm-30">
                                <div class="section-left-sub-title mb-20">
                                    <h5 class="sub-title text-primary-color">Project Completed</h5>
                                </div>
                                <h2 class="title">Consulting Area</h2>
                            </div>
                        </div>
                        <div class="offset-lg-1 col-lg-6">
                            <div class="section-title-right-part">
                                <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos aperiam porro necessitatibus, consequuntur, reiciendis dolore doloribus id repellendus tempora vitae quia voluptas ipsum eligendi hic.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="owl-carousel project-items-4col long-gap-left">
                            <div class="case-study-item">
                                <div class="case-study-thumb">
                                    <img class="img-full" src="{{ asset('uploads/common_dummy/480x505.jpg') }}" alt="project image">
                                    <div class="case-study-link-icon">
                                        <a href="#"><i class="webex-icon-attachment1"></i></a>
                                    </div>
                                    <div class="case-study-details p-4">
                                        <h6 class="case-study-category side-line mrb-5">Consulting</h6>
                                        <h4 class="case-study-title">Business Solution</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="case-study-item">
                                <div class="case-study-thumb">
                                    <img class="img-full" src="{{ asset('uploads/common_dummy/480x505.jpg') }}" alt="project image">
                                    <div class="case-study-link-icon">
                                        <a href="#"><i class="webex-icon-attachment1"></i></a>
                                    </div>
                                    <div class="case-study-details p-4">
                                        <h6 class="case-study-category side-line mrb-5">Consulting</h6>
                                        <h4 class="case-study-title">Business Solution</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="case-study-item">
                                <div class="case-study-thumb">
                                    <img class="img-full" src="{{ asset('uploads/common_dummy/480x505.jpg') }}" alt="project image">
                                    <div class="case-study-link-icon">
                                        <a href="#"><i class="webex-icon-attachment1"></i></a>
                                    </div>
                                    <div class="case-study-details p-4">
                                        <h6 class="case-study-category side-line mrb-5">Consulting</h6>
                                        <h4 class="case-study-title">Business Solution</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="case-study-item">
                                <div class="case-study-thumb">
                                    <img class="img-full" src="{{ asset('uploads/common_dummy/480x505.jpg') }}" alt="project image">
                                    <div class="case-study-link-icon">
                                        <a href="#"><i class="webex-icon-attachment1"></i></a>
                                    </div>
                                    <div class="case-study-details p-4">
                                        <h6 class="case-study-category side-line mrb-5">Consulting</h6>
                                        <h4 class="case-study-title">Business Solution</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="case-study-item">
                                <div class="case-study-thumb">
                                    <img class="img-full" src="{{ asset('uploads/common_dummy/480x505.jpg') }}" alt="project image">
                                    <div class="case-study-link-icon">
                                        <a href="#"><i class="webex-icon-attachment1"></i></a>
                                    </div>
                                    <div class="case-study-details p-4">
                                        <h6 class="case-study-category side-line mrb-5">Consulting</h6>
                                        <h4 class="case-study-title">Business Solution</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="case-study-item">
                                <div class="case-study-thumb">
                                    <img class="img-full" src="{{ asset('uploads/common_dummy/480x505.jpg') }}" alt="project image">
                                    <div class="case-study-link-icon">
                                        <a href="#"><i class="webex-icon-attachment1"></i></a>
                                    </div>
                                    <div class="case-study-details p-4">
                                        <h6 class="case-study-category side-line mrb-5">Consulting</h6>
                                        <h4 class="case-study-title">Business Solution</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endif
<!-- Case Study Section End -->

<!-- Clients Section Start -->
@if ($section_arr['sponsor_section'] == 1)
    @if (count($sponsors) > 0)
        <section class="pdt-0 pdb-0">
            <div class="section-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="owl-carousel client-items">
                                @foreach ($sponsors as $sponsor)
                                    <div class="client-item">
                                        <img src="{{ asset('uploads/img/sponsors/'.$sponsor->sponsor_image) }}" alt="sponsor image">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="pdt-0 pdb-0">
            <div class="section-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="owl-carousel client-items">
                                <div class="client-item">
                                    <img src="{{ asset('uploads/common_dummy/160x50.jpg') }}" alt="sponsor image">
                                </div>
                                <div class="client-item">
                                    <img src="{{ asset('uploads/common_dummy/160x50.jpg') }}" alt="sponsor image">
                                </div>
                                <div class="client-item">
                                    <img src="{{ asset('uploads/common_dummy/160x50.jpg') }}" alt="sponsor image">
                                </div>
                                <div class="client-item">
                                    <img src="{{ asset('uploads/common_dummy/160x50.jpg') }}" alt="sponsor image">
                                </div>
                                <div class="client-item">
                                    <img src="{{ asset('uploads/common_dummy/160x50.jpg') }}" alt="sponsor image">
                                </div>
                                <div class="client-item">
                                    <img src="{{ asset('uploads/common_dummy/160x50.jpg') }}" alt="sponsor image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endif
<!-- Clients Section End -->

<!-- Price Section Start -->
@if ($section_arr['price_section'] == 1)
    @if (count($prices) > 0)
        <section class="price-section pdt-110 pdb-80">
            <div class="container">
                <div class="row">
                    @php $i = 0; @endphp
                    @foreach ($prices as $price)
                        @php
                            // Explode
                             $str = $price->desc;
                             $arr =  explode(";", $str);
                        @endphp
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="price-table mrb-30 text-center">
                                <div class="table-header">
                                    @if (!empty($price->title)) <h4 class="pricing-plan-name">{{ $price->title }}</h4> @endif
                                    @if (!empty($price->currency)) <h3 class="price"><span class="price-currency">{{ $price->currency }}</span>{{ $price->price }}<span class="price-duration text-primary-color">/ @if ($price->time == 1) {{ __('frontend.per_monthly') }} @else {{ __('frontend.per_annual') }} @endif</span></h3> @endif
                                </div>
                                <div class="table-content">
                                    <ul class="list-items">
                                        @for ($i = 0; $i < count($arr)-1; $i++)
                                            <li><i class="fa fa-check mrr-10 text-primary-color"></i>{{ $arr[$i] }}</li>
                                        @endfor
                                    </ul>
                                </div>
                                <div class="table-footer">
                                    @if (!empty($price->btn_name)) <a class="cs-btn-one btn-gradient-color" href="@if (!empty($price->btn_link)) {{ $price->btn_link }} @else # @endif">{{ $price->btn_name }}</a>  @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @else
        <section class="price-section pdt-110 pdb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="price-table mrb-30 text-center">
                            <div class="table-header">
                                <h4 class="pricing-plan-name">Basic Plan</h4>
                                <h3 class="price"><span class="price-currency">$</span>8.9<span class="price-duration text-primary-color">/ Per Month</span></h3>
                            </div>
                            <div class="table-content">
                                <ul class="list-items">
                                    <li><i class="fa fa-check mrr-10 text-primary-color"></i>Standard Feature</li>
                                    <li><i class="fa fa-check mrr-10 text-primary-color"></i>Lifetime free support</li>
                                    <li><i class="fa fa-check mrr-10 text-primary-color"></i>Extra features</li>
                                    <li><i class="fa fa-check mrr-10 text-primary-color"></i>Upgrate options</li>
                                    <li><i class="fa fa-check mrr-10 text-primary-color"></i>Full access</li>
                                </ul>
                            </div>
                            <div class="table-footer">
                                <a href="#" class="cs-btn-one btn-gradient-color">Choose Plan</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="price-table mrb-30 text-center">
                            <div class="table-header">
                                <h4 class="pricing-plan-name">Popular Plan</h4>
                                <h3 class="price"><span class="price-currency">$</span>29.9<span class="price-duration text-primary-color">/ Per Month</span></h3>
                            </div>
                            <div class="table-content">
                                <ul class="list-items">
                                    <li><i class="fa fa-check mrr-10 text-primary-color"></i>Standard Feature</li>
                                    <li><i class="fa fa-check mrr-10 text-primary-color"></i>Lifetime free support</li>
                                    <li><i class="fa fa-check mrr-10 text-primary-color"></i>Extra features</li>
                                    <li><i class="fa fa-check mrr-10 text-primary-color"></i>Upgrate options</li>
                                    <li><i class="fa fa-check mrr-10 text-primary-color"></i>Full access</li>
                                </ul>
                            </div>
                            <div class="table-footer">
                                <a href="#" class="cs-btn-one btn-gradient-color">Choose Plan</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="price-table mrb-30 text-center">
                            <div class="table-header">
                                <h4 class="pricing-plan-name">Premium Plan</h4>
                                <h3 class="price"><span class="price-currency">$</span>89.9<span class="price-duration text-primary-color">/ Per Month</span></h3>
                            </div>
                            <div class="table-content">
                                <ul class="list-items">
                                    <li><i class="fa fa-check mrr-10 text-primary-color"></i>Standard Feature</li>
                                    <li><i class="fa fa-check mrr-10 text-primary-color"></i>Lifetime free support</li>
                                    <li><i class="fa fa-check mrr-10 text-primary-color"></i>Extra features</li>
                                    <li><i class="fa fa-check mrr-10 text-primary-color"></i>Upgrate options</li>
                                    <li><i class="fa fa-check mrr-10 text-primary-color"></i>Full access</li>
                                </ul>
                            </div>
                            <div class="table-footer">
                                <a href="#" class="cs-btn-one btn-gradient-color">Choose Plan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endif
<!-- Price Section End -->

<!-- FAQ Section Start -->
@if ($section_arr['faq_section'])
    @if (isset($faq_section) || count($faqs) > 0)
        <section class="request-a-call-back pdt-110 pdb-110"  data-background="{{ asset('assets/frontend/images/bg/6.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        @if (!empty($faq_section->top_title)) <h5 class="sub-title-side-line text-primary-color mrt-0 mrb-15">{{ $faq_section->top_title }}</h5> @endif
                        @if (!empty($faq_section->title)) <h2 class="faq-title mrb-30">{{ $faq_section->title }}</h2> @endif
                        @if (!empty($faq_section->desc)) <p class="mrb-40">{{ $faq_section->desc }}</p> @endif
                        @if ($section_arr['contact_section'] == 1) <a href="#contact" data-scroll-nav="6" class="cs-btn-one btn-gradient-color btn-md mrb-lg-60">{{ __('frontend.more_question') }}</a> @endif
                    </div>
                    <div class="col-lg-7">
                        <div class="faq-block">
                            <div class="accordion">
                                @foreach ($faqs as $faq)
                                    <div class="accordion-item">
                                        <div class="accordion-header @if ($loop->first) active @endif">
                                            <h5 class="title">{{ $faq->question }}</h5>
                                            <span class="fas fa-arrow-right"></span>
                                        </div>
                                        <div class="accordion-body">
                                            <p>{{ $faq->answer }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="request-a-call-back pdt-110 pdb-110"  data-background="{{ asset('assets/frontend/images/bg/6.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <h5 class="sub-title-side-line text-primary-color mrt-0 mrb-15">Frequently Asked Question</h5>
                        <h2 class="faq-title mrb-30">Have Any Questions?</h2>
                        <p class="mrb-40">Distinctively exploit revolutionary catalysts for chang the Seamlessly optimal rather than just in web & apps development optimal alignments for intuitive.</p>
                        <a href="#" class="cs-btn-one btn-gradient-color btn-md mrb-lg-60">More Question?</a>
                    </div>
                    <div class="col-lg-7">
                        <div class="faq-block">
                            <div class="accordion">
                                <div class="accordion-item">
                                    <div class="accordion-header active">
                                        <h5 class="title">Q: What happens during Freshers' Week?</h5>
                                        <span class="fas fa-arrow-right"></span>
                                    </div>
                                    <div class="accordion-body">
                                        <p>A: Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment.</p>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-header">
                                        <h5 class="title">Q: What is the transfer application process?</h5>
                                        <span class="fas fa-arrow-right"></span>
                                    </div>
                                    <div class="accordion-body">
                                        <p>A: Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment.</p>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-header">
                                        <h5 class="title">Q: Why should I attend community college?</h5>
                                        <span class="fas fa-arrow-right"></span>
                                    </div>
                                    <div class="accordion-body">
                                        <p>A: Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment.</p>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-header">
                                        <h5 class="title">Q: What is a liberal arts of college students?</h5>
                                        <span class="fas fa-arrow-right"></span>
                                    </div>
                                    <div class="accordion-body">
                                        <p>A: Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment.</p>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-header">
                                        <h5 class="title">Q: What is the transfer application process?</h5>
                                        <span class="fas fa-arrow-right"></span>
                                    </div>
                                    <div class="accordion-body">
                                        <p>A: Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment.</p>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-header">
                                        <h5 class="title">Q: Why should I attend community college?</h5>
                                        <span class="fas fa-arrow-right"></span>
                                    </div>
                                    <div class="accordion-body">
                                        <p>A: Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endif
<!-- FAQ Section End -->

<!-- Testimonials Section Start -->
@if ($section_arr['client_section'] == 1)
    @if (isset($testimonial_section) || count($testimonials) > 0)
        <section class="request-a-call-back pdt-80 pdb-110 pdb-lg-70" data-background="{{ asset('assets/frontend/images/bg/abs-bg7.png') }}">
            <div class="section-title text-center wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                <div class="container">
                    <div class="row">
                        <div class="col"></div>
                        <div class="col-lg-8">
                            <div class="title-box-center">
                                @if (!empty($testimonial_section->shadow_text)) <h5 class="shadow-text">{{ $testimonial_section->shadow_text }}</h5> @endif
                                @if (!empty($testimonial_section->top_title)) <h5 class="sub-title-center text-primary-color line-top-center mrb-30">{{ $testimonial_section->top_title }}</h5> @endif
                                @if (!empty($testimonial_section->title)) <h2 class="title">{{ $testimonial_section->title }}</h2> @endif
                            </div>
                        </div>
                        <div class="col"></div>
                    </div>
                </div>
            </div>
            <div class="section-content">
                <div class="container">
                    <div class="row">
                        <div class="owl-carousel testimonial-items-2col mrb-lg-40">
                            @foreach ($testimonials as $testimonial)
                                <div class="testimonial-item">
                                    <span class="quote-icon fas fa-quote-right"></span>
                                    @if (!empty($testimonial->testimonial_image))
                                        <div class="testimonial-thumb">
                                            <img src="{{ asset('uploads/img/testimonials/'.$testimonial->testimonial_image) }}" alt="testimonial image">
                                        </div>
                                    @endif
                                    @if (!empty($testimonial->name)) <h4 class="client-name">{{ $testimonial->name }}</h4> @endif
                                    @if (!empty($testimonial->job)) <h6 class="client-designation">{{ $testimonial->job }}</h6> @endif
                                    <div class="testimonial-content">
                                        @if (!empty($testimonial->desc)) <p class="comments">{{ $testimonial->desc }}</p> @endif
                                        <ul class="star-rating">
                                            @for ($i = 0; $i <= 5; $i++)
                                                @if ($i < 3)
                                                    @for ($i = 0; $i < $testimonial->star; $i++)
                                                        <li><i class="webex-icon-star-full  text-primary-color"></i></li>
                                                    @endfor
                                                @else
                                                    <li><i class=" webex-icon-star-empty text-primary-color"></i></li>
                                                @endif
                                            @endfor
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="request-a-call-back pdt-80 pdb-110 pdb-lg-70" data-background="{{ asset('assets/frontend/images/bg/abs-bg7.png') }}">
            <div class="section-title text-center wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                <div class="container">
                    <div class="row">
                        <div class="col"></div>
                        <div class="col-lg-8">
                            <div class="title-box-center">
                                <h5 class="shadow-text">Reviews</h5>
                                <h5 class="sub-title-center text-primary-color line-top-center mrb-30">Testimonials</h5>
                                <h2 class="title">What People and Clients Think About Us?</h2>
                            </div>
                        </div>
                        <div class="col"></div>
                    </div>
                </div>
            </div>
            <div class="section-content">
                <div class="container">
                    <div class="row">
                        <div class="owl-carousel testimonial-items-2col mrb-lg-40">
                            <div class="testimonial-item">
                                <span class="quote-icon fas fa-quote-right"></span>
                                <div class="testimonial-thumb">
                                    <img src="{{ asset('uploads/common_dummy/80x80.jpg') }}" alt="testimonial image">
                                </div>
                                <h4 class="client-name">Aurther Maxwell</h4>
                                <h6 class="client-designation">CEO, Apple Inc.</h6>
                                <div class="testimonial-content">
                                    <p class="comments">Lorem ipsum dolor sit amet, consectetur adipisicing elit oluptatibus blanditiis amet optio fugiat nisi est repellendus iusto quis harum laboriosam nostrum unde distinctio</p>
                                    <ul class="star-rating">
                                        <li><i class="webex-icon-star-full text-primary-color"></i></li>
                                        <li><i class="webex-icon-star-full text-primary-color"></i></li>
                                        <li><i class="webex-icon-star-full text-primary-color"></i></li>
                                        <li><i class="webex-icon-star-half text-primary-color"></i></li>
                                        <li><i class="webex-icon-star-empty text-primary-color"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="testimonial-item">
                                <span class="quote-icon fas fa-quote-right"></span>
                                <div class="testimonial-thumb">
                                    <img src="{{ asset('uploads/common_dummy/80x80.jpg') }}" alt="testimonial image">
                                </div>
                                <h4 class="client-name">Aurther Maxwell</h4>
                                <h6 class="client-designation">CEO, Apple Inc.</h6>
                                <div class="testimonial-content">
                                    <p class="comments">Lorem ipsum dolor sit amet, consectetur adipisicing elit oluptatibus blanditiis amet optio fugiat nisi est repellendus iusto quis harum laboriosam nostrum unde distinctio</p>
                                    <ul class="star-rating">
                                        <li><i class="webex-icon-star-full text-primary-color"></i></li>
                                        <li><i class="webex-icon-star-full text-primary-color"></i></li>
                                        <li><i class="webex-icon-star-full text-primary-color"></i></li>
                                        <li><i class="webex-icon-star-half text-primary-color"></i></li>
                                        <li><i class="webex-icon-star-empty text-primary-color"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="testimonial-item">
                                <span class="quote-icon fas fa-quote-right"></span>
                                <div class="testimonial-thumb">
                                    <img src="{{ asset('uploads/common_dummy/80x80.jpg') }}" alt="testimonial image">
                                </div>
                                <h4 class="client-name">Aurther Maxwell</h4>
                                <h6 class="client-designation">CEO, Apple Inc.</h6>
                                <div class="testimonial-content">
                                    <p class="comments">Lorem ipsum dolor sit amet, consectetur adipisicing elit oluptatibus blanditiis amet optio fugiat nisi est repellendus iusto quis harum laboriosam nostrum unde distinctio</p>
                                    <ul class="star-rating">
                                        <li><i class="webex-icon-star-full text-primary-color"></i></li>
                                        <li><i class="webex-icon-star-full text-primary-color"></i></li>
                                        <li><i class="webex-icon-star-full text-primary-color"></i></li>
                                        <li><i class="webex-icon-star-half text-primary-color"></i></li>
                                        <li><i class="webex-icon-star-empty text-primary-color"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endif
<!-- Testimonials Section End -->

<!-- News Section Start -->
@if ($section_arr['blog_section'] == 1)
    @if (isset($blog_section) || count($recent_posts))
        <section id="news" class="bg-silver-light pdt-105 pdb-80" data-background="{{ asset('assets/frontend/images/bg/abs-bg4.png') }}" data-scroll-index="5">
            <div class="section-title mrb-30 mrb-md-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-xl-6">
                            @if (!empty($blog_section->top_title)) <h5 class="mrb-15 text-primary-color sub-title-side-line">{{ $blog_section->top_title }}</h5> @endif
                            @if (!empty($blog_section->title)) <h2 class="mrb-30">{{ $blog_section->title }}</h2> @endif
                        </div>
                        @if (count($recent_posts) > 2)
                            <div class="col-lg-4 col-xl-6 align-self-center text-left text-lg-right">
                                <a href="{{ url('blogs') }}" class="cs-btn-one btn-gradient-color btn-md">{{ __('frontend.all_news') }}</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="section-content">
                <div class="container">
                    <div class="row">
                        @foreach ($recent_posts as $recent_post)
                            <div class="col-md-6 col-lg-6 col-xl-4">
                                <div class="news-wrapper mrb-30 mrb-sm-40">
                                    <div class="news-thumb">
                                        @if (!empty($recent_post->blog_image))
                                            <img src="{{ asset('uploads/img/blogs/'.$recent_post->blog_image) }}" class="img-full" alt="blog image" >
                                        @else
                                            <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" class="img-full" alt="blog image">
                                        @endif
                                        <div class="news-top-meta">
                                            <span class="entry-category">{{ $recent_post->category->category_name }}</span>
                                        </div>
                                    </div>
                                    <div class="news-details">
                                        <div class="news-description mb-20">
                                            <h4 class="the-title mrb-30"><a href="{{ url('blog/'.$recent_post->slug) }}">{{ $recent_post->title }}</a></h4>
                                            <div class="news-bottom-meta">
                                                <span class="entry-date mrr-20"><i class="far fa-calendar-alt mrr-10 text-primary-color"></i>{{ Carbon\Carbon::parse($recent_post->created_at)->isoFormat('DD') }} {{ Carbon\Carbon::parse($recent_post->created_at)->isoFormat('MMM') }} {{ Carbon\Carbon::parse($recent_post->created_at)->isoFormat('GGGG') }}</span>
                                                <span class="entry-author"><i class="far fa-user mrr-10 text-primary-color"></i>@if (!empty($recent_post->author)) {{ $recent_post->author }} @else {{ __('frontend.admin') }} @endif</span>
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
        <section id="news" class="bg-silver-light pdt-105 pdb-80" data-background="{{ asset('assets/frontend/images/bg/abs-bg4.png') }}" data-scroll-index="5">
            <div class="section-title mrb-30 mrb-md-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-xl-6">
                            <h5 class="mrb-15 text-primary-color sub-title-side-line">News And Updates</h5>
                            <h2 class="mrb-30">Let's Checkout our All Latest News</h2>
                        </div>
                        <div class="col-lg-4 col-xl-6 align-self-center text-left text-lg-right">
                            <a href="#" class="cs-btn-one btn-gradient-color btn-md">All News</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-xl-4">
                            <div class="news-wrapper mrb-30 mrb-sm-40">
                                <div class="news-thumb">
                                    <img class="img-full" src="{{ asset('uploads/common_dummy/775x575.jpg') }}" alt="blog image">
                                    <div class="news-top-meta">
                                        <span class="entry-category">Business</span>
                                    </div>
                                </div>
                                <div class="news-details">
                                    <div class="news-description mb-20">
                                        <h4 class="the-title mrb-30"><a href="#">Tech Entrepreneur Credits Paper For Success</a></h4>
                                        <div class="news-bottom-meta">
                                            <span class="entry-date mrr-20"><i class="far fa-calendar-alt mrr-10 text-primary-color"></i>01 Jan, 2020</span>
                                            <span class="entry-author"><i class="far fa-user mrr-10 text-primary-color"></i>Admin</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-4">
                            <div class="news-wrapper mrb-30 mrb-sm-40">
                                <div class="news-thumb">
                                    <img class="img-full" src="{{ asset('uploads/common_dummy/775x575.jpg') }}" alt="blog image">
                                    <div class="news-top-meta">
                                        <span class="entry-category">Business</span>
                                    </div>
                                </div>
                                <div class="news-details">
                                    <div class="news-description mb-20">
                                        <h4 class="the-title mrb-30"><a href="#">Tech Entrepreneur Credits Paper For Success</a></h4>
                                        <div class="news-bottom-meta">
                                            <span class="entry-date mrr-20"><i class="far fa-calendar-alt mrr-10 text-primary-color"></i>01 Jan, 2020</span>
                                            <span class="entry-author"><i class="far fa-user mrr-10 text-primary-color"></i>Admin</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-4">
                            <div class="news-wrapper mrb-30 mrb-sm-40">
                                <div class="news-thumb">
                                    <img class="img-full" src="{{ asset('uploads/common_dummy/775x575.jpg') }}" alt="blog image">
                                    <div class="news-top-meta">
                                        <span class="entry-category">Business</span>
                                    </div>
                                </div>
                                <div class="news-details">
                                    <div class="news-description mb-20">
                                        <h4 class="the-title mrb-30"><a href="#">Tech Entrepreneur Credits Paper For Success</a></h4>
                                        <div class="news-bottom-meta">
                                            <span class="entry-date mrr-20"><i class="far fa-calendar-alt mrr-10 text-primary-color"></i>01 Jan, 2020</span>
                                            <span class="entry-author"><i class="far fa-user mrr-10 text-primary-color"></i>Admin</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endif
<!-- News Section End -->

<!-- Contact Section Start -->
@if ($section_arr['contact_section'] == 1)
    @if (isset($contact_section) || count($contacts) > 0)
        <section id="contact" class="contact-section pdt-110 pdb-95 pdb-lg-90" data-background="{{ asset('assets/frontend/images/bg/abs-bg1.png') }}"  data-scroll-index="6">
            <div class="container">
                @if (count($contacts) > 0)
                    <div class="row mrb-40">
                        @foreach ($contacts as $contact)
                            <div class="col-lg-6 col-xl-4">
                                <div class="contact-block d-flex mrb-30">
                                    @if (!empty($contact->icon))
                                        <div class="contact-icon">
                                            <i class="{{ $contact->icon }}"></i>
                                        </div>
                                    @endif
                                    <div class="contact-details @if (empty($contact->icon)) mrl-30 @endif">
                                        @if (!empty($contact->title)) <h5 class="icon-box-title mrb-10">{{ $contact->title }}</h5> @endif
                                        @if (!empty($contact->desc)) <p class="mrb-0">{{ $contact->desc }}</p> @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-5 col-xl-5">
                        @if (!empty($contact_section->top_title)) <h5 class="sub-title-side-line text-primary-color mrt-0 mrb-15">{{ $contact_section->top_title }}</h5> @endif
                        @if (!empty($contact_section->title)) <h2 class="faq-title mrb-30">{{ $contact_section->title }}</h2> @endif
                        @if (!empty($contact_section->desc)) <p class="mrb-40">{{ $contact_section->desc }}</p> @endif
                        <ul class="social-list list-lg list-primary-color list-flat mrb-md-60 clearfix">
                            @foreach($socials as $social)
                                <li><a href="{{ $social->link }}" target="_blank"><i class="{{ $social->social_media }}"></i></a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-lg-7 col-xl-7">
                        <!-- Include Alert Blade -->
                        @include('admin.alert.alert')
                        <div class="contact-form">
                            <form action="{{ route('message.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group mrb-25">
                                            <input type="text" name="name" class="form-control" placeholder="{{ __('frontend.name') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mrb-25">
                                            <input type="email" name="email" class="form-control" placeholder="{{ __('frontend.email') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mrb-25">
                                            <input type="text" name="subject" class="form-control" placeholder="{{ __('frontend.subject') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mrb-25">
                                            <textarea rows="4" name="message" class="form-control" placeholder="{{ __('frontend.message') }}" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <button type="submit" class="cs-btn-one btn-md btn-round btn-primary-color element-shadow">{{ __('frontend.submit_now') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @if (!empty($contact_section->map_iframe))
            <div class="contact-section">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 p-0">
                            <!-- Google Map Start -->
                            <div class="mapouter fixed-height">
                                <div class="gmap_canvas">
                                    <iframe id="gmap_canvas" src="{{ $contact_section->map_iframe }}"></iframe>
                                </div>
                            </div>
                            <!-- Google Map End -->
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @else
        <section id="contact" class="contact-section pdt-110 pdb-95 pdb-lg-90" data-background="{{ asset('assets/frontend/images/bg/abs-bg1.png') }}"  data-scroll-index="6">
            <div class="container">
                <div class="row mrb-40">
                    <div class="col-lg-6 col-xl-4">
                        <div class="contact-block d-flex mrb-30">
                            <div class="contact-icon">
                                <i class="webex-icon-map1"></i>
                            </div>
                            <div class="contact-details mrl-30">
                                <h5 class="icon-box-title mrb-10">Our Address</h5>
                                <p class="mrb-0">60 Broklyn Street USA</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4">
                        <div class="contact-block d-flex mrb-30">
                            <div class="contact-icon">
                                <i class="webex-icon-Phone2"></i>
                            </div>
                            <div class="contact-details mrl-30">
                                <h5 class="icon-box-title mrb-10">Phone Number</h5>
                                <p class="mrb-0">+96 223-528-8542</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4">
                        <div class="contact-block d-flex mrb-30">
                            <div class="contact-icon">
                                <i class="webex-icon-envelope"></i>
                            </div>
                            <div class="contact-details mrl-30">
                                <h5 class="icon-box-title mrb-10">Email Us</h5>
                                <p class="mrb-0">example@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-xl-5">
                        <h5 class="sub-title-side-line text-primary-color mrt-0 mrb-15">Get In Touch</h5>
                        <h2 class="faq-title mrb-30">Have Any Questions?</h2>
                        <p class="mrb-40">Distinctively exploit revolutionary catalysts for chang the Seamlessly optimal rather than just in web &amp; apps development optimal alignments for intuitive.</p>
                        <ul class="social-list list-lg list-primary-color list-flat mrb-md-60 clearfix">
                            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-7 col-xl-7">
                        <div class="contact-form">
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group mrb-25">
                                            <input type="text" placeholder="Name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mrb-25">
                                            <input type="text" placeholder="Phone" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mrb-25">
                                            <input type="email" placeholder="Email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mrb-25">
                                            <textarea rows="4" placeholder="Messages" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <button type="submit" class="cs-btn-one btn-md btn-round btn-primary-color element-shadow">Submit Now</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="contact-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 p-0">
                        <!-- Google Map Start -->
                        <div class="mapouter fixed-height">
                            <div class="gmap_canvas">
                                <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=Graz&t=&z=11&ie=UTF8&iwloc=&output=embed"></iframe>
                                <a href="https://www.whatismyip-address.com"></a>
                            </div>
                        </div>
                        <!-- Google Map End -->
                    </div>
                </div>
            </div>
        </div>
    @endif
@endif
<!-- Contact Section End -->

<!-- Footer Area Start -->
@if ($section_arr['footer_section'] == 1)
    @if (isset($site_info) || count($socials) > 0 || count($pages) > 0 || count($contacts) > 0)
        <footer class="footer">
            <div class="footer-main-area" data-background="{{ asset('assets/frontend/images/footer-bg.png') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="widget footer-widget">
                                @if (!empty($general_site_image->site_white_logo_image)) <img src="{{ asset('uploads/img/general/'.$general_site_image->site_colored_logo_image) }}" class="mrb-20" alt="footer image"> @endif
                                <address class="mrb-25">
                                    @if (!empty($site_info->short_desc)) <p class="text-light-gray">{{ $site_info->short_desc }}</p> @endif
                                </address>
                                <ul class="social-list">
                                    @foreach ($socials as $social)
                                        <li><a href="@if (!empty($social->link)) {{ $social->link }} @else # @endif"><i class="{{ $social->social_media }}"></i></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-6 col-md-6">
                            <div class="widget footer-widget">
                                <h5 class="widget-title text-white mrb-30">Useful Links</h5>
                                <ul class="footer-widget-list">
                                    <li><a href="#home" data-scroll-nav="0">{{ __('frontend.home') }}</a></li>
                                    @if ($section_arr['about_section'] == 1) <li><a href="#about" data-scroll-nav="1">{{ __('frontend.about') }}</a></li> @endif
                                    @if ($section_arr['service_section'] == 1) <li><a href="#service" data-scroll-nav="2">{{ __('frontend.services') }}</a></li> @endif
                                    @if ($section_arr['team_section'] == 1) <li><a href="#team" data-scroll-nav="3">{{ __('frontend.teams') }}</a></li> @endif
                                    @if ($section_arr['project_section'] == 1) <li><a href="#case-study" data-scroll-nav="4">{{ __('frontend.projects') }}</a></li> @endif
                                    @if ($section_arr['blog_section'] == 1) <li><a href="#news" data-scroll-nav="5">{{ __('frontend.news') }}</a></li> @endif
                                    @if ($section_arr['contact_section'] == 1) <li><a href="#contact" data-scroll-nav="6">{{ __('frontend.contact') }}</a></li> @endif
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="widget footer-widget">
                                <h5 class="widget-title text-white mrb-30">{{ __('frontend.help') }}</h5>
                                <ul class="footer-widget-list">
                                    @foreach ($pages as $page)
                                        @if ($page->display_footer_menu == 1)
                                            <li>
                                                <a href="{{ url('page/'.$page->page_slug) }}">{{ $page->page_title }}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="widget footer-widget">
                                <h5 class="widget-title text-white mrb-30">{{ __('frontend.contact_info') }}</h5>
                                @foreach ($contacts as $contact)
                                    <div class="mrb-10"><a href="#" class="text-light-gray">@if (!empty($contact->icon)) <i class="{{ $contact->icon }} mrr-10"></i> @endif {{ $contact->desc }}</a></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom-area">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="text-center">
                                <span class="text-light-gray">@if (!empty($site_info->copyright)) {{ $site_info->copyright }} @endif</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    @else
        <footer class="footer">
            <div class="footer-main-area" data-background="{{ asset('assets/frontend/images/footer-bg.png') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="widget footer-widget">
                                <img src="{{ asset('uploads/common_dummy/logo-white.png') }}" alt="footer image" class="mrb-20">
                                <address class="mrb-25">
                                    <p class="text-light-gray">32 Dora Creek, tuntable creek, New South Wales 2480, Australia</p>
                                    <div class="mrb-10"><a href="#" class="text-light-gray"><i class="fas fa-phone-alt mrr-10"></i>+088 234 432 15565</a></div>
                                    <div class="mrb-10"><a href="#" class="text-light-gray"><i class="fas fa-envelope mrr-10"></i>sample@yourdomain.com</a></div>
                                    <div class="mrb-0"><a href="#" class="text-light-gray"><i class="fas fa-globe mrr-10"></i>www.domainname.com</a></div>
                                </address>
                                <ul class="social-list">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-6 col-md-6">
                            <div class="widget footer-widget">
                                <h5 class="widget-title text-white mrb-30">Useful Links</h5>
                                <ul class="footer-widget-list">
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">About</a></li>
                                    <li><a href="#">Team</a></li>
                                    <li><a href="#">Service</a></li>
                                    <li><a href="#">News</a></li>
                                    <li><a href="#">Policy</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-6 col-md-6">
                            <div class="widget footer-widget">
                                <h5 class="widget-title text-white mrb-30">Help</h5>
                                <ul class="footer-widget-list">
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">About</a></li>
                                    <li><a href="#">Team</a></li>
                                    <li><a href="#">Service</a></li>
                                    <li><a href="#">News</a></li>
                                    <li><a href="#">Policy</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="widget footer-widget">
                                <h5 class="widget-title text-white mrb-30">Contact Info</h5>
                                <div class="mrb-10"><a href="#" class="text-light-gray"><i class="fas fa-phone-alt mrr-10"></i>+088 234 432 15565</a></div>
                                <div class="mrb-10"><a href="#" class="text-light-gray"><i class="fas fa-envelope mrr-10"></i>sample@yourdomain.com</a></div>
                                <div class="mrb-0"><a href="#" class="text-light-gray"><i class="fas fa-globe mrr-10"></i>www.domainname.com</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom-area">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="text-center">
                                <span class="text-light-gray">Copyright © 2020 by <a class="text-primary-color" target="_blank" href="https://themeforest.net/user/simsiyeka"> Simsiyeka</a> | All rights reserved </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    @endif
@endif
<!-- Footer Area End -->

<!-- BACK TO TOP SECTION -->
<div class="back-to-top bg-gradient-color">
    <i class="fab fa-angle-up"></i>
</div>











<!-- Scripts -->
<script src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/scroll.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery-core-plugins.js') }}"></script>
<script src="{{ asset('assets/frontend/js/main.js') }}"></script>

<!-- Soft scrolling -->
<script>
    $.scrollIt({
        upKey: 38,                // key code to navigate to the next section
        downKey: 40,              // the easing function for animation
        scrollTime: 800,          // how long (in ms) the animation takes
        activeClass: 'active',    // class given to the active nav element
        onPageChange: null,       // function(pageIndex) that is called when page is changed
        topOffset: -80            // offste (in px) for fixed top navigation
    });
</script>

</body>
</html>