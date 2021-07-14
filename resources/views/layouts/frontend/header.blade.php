@section('header')
    <!-- header Start test -->
    <header class="header-style-two" data-scroll-index="0">
        <div class="header-wrapper">
            <div class="header-top-area bg-gradient-color d-none d-lg-block">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 header-top-left-part">
                            @if (!empty($site_info->address)) <span class="address" data-toggle="tooltip"
                                                                    data-placement="top"
                                                                    title="{{ $site_info->address }}"><i
                                    class="webexflaticon flaticon-placeholder-1"></i> {{ \Illuminate\Support\Str::limit($site_info->address, 30, $end='...') }}</span> @endif
                            @if (!empty($site_info->email)) <span class="phone"><i class="webexflaticon flaticon-send"></i> {{ $site_info->email }}</span> @endif
                        </div>
                        <div class="col-lg-6 header-top-right-part text-right">
                            <ul class="social-links">
                                @foreach($socials as $social)
                                    <li><a href="{{ $social->link }}" target="_blank"><i
                                                class="{{ $social->social_media }}"></i></a></li>
                                @endforeach
                            </ul>
                            @if (count($display_dropdowns) > 0)
                                <div class="language">
                                    <a class="language-btn" href="#"><i class="webexflaticon flaticon-internet"></i>
                                        @if (session()->has('language_name_from_dropdown')) {{ session()->get('language_name_from_dropdown') }} @else {{ $language->language_name }} @endif
                                    </a>
                                    <ul class="language-dropdown">
                                        @foreach ($display_dropdowns as $display_dropdown)
                                            <li>
                                                <a href="{{ url('language/set-locale/'.$display_dropdown->id) }}">{{ $display_dropdown->language_name }}</a>
                                            </li>
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
                                    <img id="logo-image" class="img-center"
                                         src="{{ asset('uploads/img/general/'.$general_site_image->site_white_logo_image) }}"
                                         alt="logo image">
                                @else
                                    <img id="logo-image" class="img-center"
                                         src="{{ asset('uploads/common_dummy/logo.png') }}" alt="logo image">
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
                                            <input type="text" id="s" class="form-control" name="search"
                                                   placeholder="{{ __('frontend.search') }}" required>
                                            <div class="input-box">
                                                <button type="submit" id="searchsubmit"><i class="fas fa-search"></i>
                                                </button>
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
                                            <img
                                                src="{{ asset('uploads/img/general/'.$general_site_image->site_white_logo_image) }}"
                                                alt="logo image">
                                        @else
                                            <img src="{{ asset('uploads/common_dummy/logo.png') }}" alt="logo image"
                                                 style="height: 72px;">
                                        @endif
                                    </a>
                                </div>
                                <div class="side-info mrb-30">
                                    <div class="side-panel-element mrb-25">
                                        <h4 class="mrb-10">{{ __('frontend.office_address') }}</h4>
                                        <ul class="list-items">
                                            @if (!empty($site_info->address))
                                                <li><span class="fa fa-map-marker-alt mrr-10 text-primary-color"></span><a
                                                        href="@if (!empty($site_info->address_map_link)) {{ $site_info->address_map_link }} @else # @endif">{{ $site_info->address }}</a>
                                                </li> @endif
                                            @if (!empty($site_info->email))
                                                <li><span
                                                        class="fas fa-envelope mrr-10 text-primary-color"></span>{{ $site_info->email }}
                                                </li> @endif
                                            @if (!empty($site_info->phone))
                                                <li><span
                                                        class="fas fa-phone-alt mrr-10 text-primary-color"></span>{{ $site_info->phone }}
                                                </li> @endif
                                        </ul>
                                    </div>
                                </div>
                                <h4 class="mrb-15">{{ __('frontend.social_list') }}</h4>
                                <ul class="social-list">
                                    @foreach ($socials as $social)
                                        <li><a href="@if (!empty($social->link)) {{ $social->link }} @else # @endif"><i
                                                    class="{{ $social->social_media }}"></i></a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="main-menu f-right">
                                <nav id="mobile-menu-right">
                                    <ul class="one-pagenav">
                                        <li><a href="#home" data-scroll-nav="0">{{ __('frontend.home') }}</a></li>
                                        @if ($section_arr['about_section'] == 1)
                                            <li><a href="#about" data-scroll-nav="1">{{ __('frontend.about') }}</a>
                                            </li> @endif
                                        @if ($section_arr['service_section'] == 1)
                                            <li><a href="#service" data-scroll-nav="2">{{ __('frontend.services') }}</a>
                                            </li> @endif
                                        {{--                                    @if ($section_arr['project_section'] == 1)--}}
                                        {{--                                        <li><a href="#case-study" data-scroll-nav="4">{{ __('frontend.projects') }}</a>--}}
                                        {{--                                        </li> @endif--}}
                                        @if ($section_arr['blog_section'] == 1)
                                            <li><a href="#news" data-scroll-nav="5">{{ __('frontend.news') }}</a>
                                            </li> @endif
                                        @if ($section_arr['page_menu'] == 1)
                                            <li class="has-sub right-view">
                                                <a href="#">{{ __('frontend.pages') }}</a>
                                                <ul class="sub-menu">
                                                    <li><a href="http://127.0.0.1:8000/blog/category/documents"
                                                        >{{ __('frontend.teams') }}</a>
                                                    </li>
                                                    @if ($section_arr['gallery_section'] == 1)
                                                        <li><a href="{{ url('gallery') }}">{{ __('frontend.gallery') }}</a>
                                                        </li> @endif
                                                    <li><a href="http://127.0.0.1:8000/blog/category/bank-accounts"
                                                        >bank accounts</a>
                                                    </li>
                                                    @foreach ($pages as $page)
                                                        @if ($page->display_footer_menu != 1)
                                                            <li>
                                                                <a href="{{ url('page/'.$page->page_slug) }}">{{ $page->page_title }}</a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                    @php unset($page); @endphp
                                                </ul>
                                            </li>
                                        @endif
                                        @if ($section_arr['contact_section'] == 1)
                                            <li><a href="#contact" data-scroll-nav="6">{{ __('frontend.contact') }}</a>
                                            </li> @endif

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
@endsection
