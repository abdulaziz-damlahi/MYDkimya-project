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
    <meta name="twitter:image" content="@if (!empty($general_site_image->favicon_image))){{ asset('uploads/img/general/'.$general_site_image->favicon_image) }} @endif">
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

    <!-- Gallery Css -->
    @if ($section_arr['gallery_section'] == 1)
        <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/vendor/css/fancybox.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/vendor/css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/css/style.css') }}">
    @endif

    <!-- Dynamic Css -->
    <style>
        @if (!empty($site_info->address) && empty($site_info->email))
            .header-top-area .header-top-left-part .address:after {
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
                                    <li><a href="{{ url('/') }}">{{ __('frontend.home') }}</a></li>
                                    @if ($section_arr['about_section'] == 1) <li><a href="{{ url('/'.'#about') }}">{{ __('frontend.about') }}</a></li> @endif
                                    @if ($section_arr['service_section'] == 1) <li><a href="{{ url('/'.'#service') }}">{{ __('frontend.services') }}</a></li> @endif
                                    @if ($section_arr['project_section'] == 1) <li><a href="{{ url('/'.'#case-study') }}">{{ __('frontend.projects') }}</a></li> @endif
                                    @if ($section_arr['blog_section'] == 1) <li><a href="{{ url('/'.'#news') }}">{{ __('frontend.news') }}</a></li> @endif
                                    @if ($section_arr['page_menu'] == 1)
                                        <li class="has-sub right-view">
                                            <a href="#">{{ __('frontend.pages') }}</a>
                                            <ul class="sub-menu">
                                                @if ($section_arr['team_section'] == 1) <li><a href="{{ url('/'.'#team') }}">{{ __('frontend.teams') }}</a></li> @endif
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
                                    @if ($section_arr['contact_section'] == 1) <li><a href="{{ url('/'.'#contact') }}">{{ __('frontend.contact') }}</a></li> @endif
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


@yield('content')


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
                                    <li><a href="{{ url('/') }}">{{ __('frontend.home') }}</a></li>
                                    @if ($section_arr['about_section'] == 1) <li><a href="{{ url('/'.'#about') }}">{{ __('frontend.about') }}</a></li> @endif
                                    @if ($section_arr['service_section'] == 1) <li><a href="{{ url('/'.'#service') }}">{{ __('frontend.services') }}</a></li> @endif
                                    @if ($section_arr['team_section'] == 1) <li><a href="{{ url('/'.'#team') }}">{{ __('frontend.teams') }}</a></li> @endif
                                    @if ($section_arr['project_section'] == 1) <li><a href="{{ url('/'.'#case-study') }}">{{ __('frontend.projects') }}</a></li> @endif
                                    @if ($section_arr['blog_section'] == 1) <li><a href="{{ url('/'.'#news') }}">{{ __('frontend.news') }}</a></li> @endif
                                    @if ($section_arr['contact_section'] == 1) <li><a href="{{ url('/'.'#contact') }}">{{ __('frontend.contact') }}</a></li> @endif
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
                                <span class="text-light-gray">Copyright © 2021 by <a class="text-primary-color" target="_blank" href="https://codecanyon.net/user/simsiyeka"> Simsiyeka</a> | All rights reserved </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    @endif
@endif
<!-- Footer Area End -->


<!-- Scripts -->
<script src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/scroll.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery-core-plugins.js') }}"></script>
<script src="{{ asset('assets/frontend/js/main.js') }}"></script>

<!-- Gallery Js -->
@if ($section_arr['gallery_section'] == 1)
    <!--// Required JS Files //-->
    <script src="{{ asset('assets/frontend/vendor/vendor/js/waypoints.min.js') }}" defer></script>
    <script src="{{ asset('assets/frontend/vendor/vendor/js/isotope.min.js') }}" defer></script>
    <script src="{{ asset('assets/frontend/vendor/vendor/js/images.loaded.min.js') }}" defer></script>
    <script src="{{ asset('assets/frontend/vendor/vendor/js/tilt.jquery.js') }}" defer></script>
    <script src="{{ asset('assets/frontend/vendor/vendor/js/fancybox.min.js') }}" defer></script>
    <script src="{{ asset('assets/frontend/vendor/vendor/js/wow.min.js') }}" defer></script>
    <script src="{{ asset('assets/frontend/vendor/js/main.js') }}" defer></script>
@endif

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