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
                        <h3 class="title text-white">{{ $blog->title }}</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a  href="{{ url('/') }}">{{ __('frontend.home') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $blog->title }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Title End -->

    <!-- Blog Single Start -->
    <section class="blog-single-news pdt-110 pdb-90">
        <div class="container">
            <!-- Include Alert Blade -->
            @include('admin.alert.alert')

            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="single-news-details news-wrapper mrb-30">
                        @if (!empty($blog->blog_image))
                            <div class="news-thumb">
                                <img class="img-full" src="{{ asset('uploads/img/blogs/'.$blog->blog_image) }}" alt="blog image">
                                <div class="news-top-meta">
                                    <span class="entry-category">{{ $blog->category->category_name }}</span>
                                </div>
                            </div>
                        @endif
                        <div class="single-news-content">
                            <div class="news-bottom-meta mrt-20 mrb-10">
                                <span class="entry-author mrr-20"><i class="far fa-user mrr-10 text-primary-color"></i>@if (!empty($blog->author)) {{ $blog->author }} @else {{ __('frontend.admin') }} @endif</span>
                                <span class="entry-date"><i class="far fa-calendar-alt mrr-10 text-primary-color"></i>{{ Carbon\Carbon::parse($blog->created_at)->isoFormat('DD') }} {{ Carbon\Carbon::parse($blog->created_at)->isoFormat('MMM') }} {{ Carbon\Carbon::parse($blog->created_at)->isoFormat('GGGG') }}</span>
                                <span class="entry-date"><i class="far fa-eye mrr-10 text-primary-color"></i>{{ $blog->view }}</span>
                            </div>
                            <h3 class="entry-title text-capitalize mrb-20"><a href="{{ url('blog/'.$blog->slug) }}">{{ $blog->title }}</a></h3>
                            <div class="entry-content">
                                <p>@php echo html_entity_decode($blog->desc); @endphp</p>
                            </div>

                            <div class="comments-area">
                                @if (count($comments) > 0)
                                    <h3 class="comments-title">{{ __('frontend.comments') }}({{ count($comments) }})</h3>
                                @endif
                                <ol class="comment-list">
                                    @foreach ($comments as $comment)
                                        <li class="comment">
                                            <article class="comment-body">
                                                <div class="comment-author-thumb f-left">
                                                    <i class="fas fa-user font-90 mr-4"></i>
                                                </div>
                                                <div class="comment-content">
                                                    <h6 class="comment-author">{{ $comment->name }}</h6>
                                                    <div class="comment-meta">
                                                        <div class="comment-metadata">
                                                            <a href="#">
															<span>
																<i class="far fa-calendar-alt text-primary-color mrr-5"></i>
																{{ Carbon\Carbon::parse($comment->created_at)->isoFormat('DD') }} {{ Carbon\Carbon::parse($comment->created_at)->isoFormat('MMM') }} {{ Carbon\Carbon::parse($comment->created_at)->isoFormat('GGGG') }}
															</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <p class="comment-text">{{ $comment->comment }}</p>
                                                </div>
                                            </article>
                                        </li>
                                    @endforeach
                                </ol>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 sidebar-right">
                    <aside class="news-sidebar-widget">
                        <div class="widget sidebar-widget widget-search mrb-30">
                            <form class="search-form" action="{{ route('blog-page.search') }}" method="POST">
                                @csrf
                                <label>
                                    <input type="text" name="search" placeholder="{{ __('frontend.search_here') }}" class="search-field" required>
                                </label>
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="widget sidebar-widget widget-categories">
                            <h4 class="mrb-30 single-blog-widget-title">{{ __('frontend.categories') }}</h4>
                            <ul class="list">
                                <li>
                                    <i class="fas fa-caret-right vertical-align-middle text-primary-color mrr-10"></i><a href="{{ url('blogs') }}">{{ __('frontend.all') }}</a>
                                </li>
                                @foreach ($blog_count_categories as $blog_count_category)
                                    <li>
                                        @if (isset($blog_count_category->category->category_slug))
                                            <i class="fas fa-caret-right vertical-align-middle text-primary-color mrr-10"></i><a href="{{ url('blog/category/'.$blog_count_category->category->category_slug) }}">{{$blog_count_category->category->category_name }}<span  class="f-right">({{ $blog_count_category->category_count }})</span></a>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget sidebar-widget widget-popular-posts">
                            <h4 class="mrb-30 single-blog-widget-title">{{ __('frontend.recent_posts') }}</h4>
                            @foreach ($recent_posts as $recent_post)
                            <div class="single-post media mrb-20">
                                @if (!empty($recent_post->blog_image))
                                    <div class="post-image mrr-20">
                                            <img src="{{ asset('uploads/img/blogs/'.$recent_post->blog_image) }}" class="img-fluid image-size-70" alt="blog image">
                                    </div>
                                @else
                                    <div class="post-image mrr-20">
                                        <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" class="img-fluid image-size-70"  alt="blog image">
                                    </div>
                                @endif
                                <div class="post-content media-body align-self-center">
                                    <h5 class="mrb-5"><a href="{{ url('blog/'.$recent_post->slug) }}">{{ $recent_post->title }}</a></h5>
                                    <span class="post-date"><i class="fa fa-clock-o mrr-5"></i>{{ Carbon\Carbon::parse($recent_post->created_at)->isoFormat('DD') }} {{ Carbon\Carbon::parse($recent_post->created_at)->isoFormat('MMM') }} {{ Carbon\Carbon::parse($recent_post->created_at)->isoFormat('GGGG') }}</span>
                                </div>
                            </div>
                                @endforeach
                        </div>
                        @if (!empty($blog->tag))
                        <div class="widget sidebar-widget widget-tags">
                            <h4 class="mrb-30 single-blog-widget-title">{{ __('frontend.tags') }}</h4>
                            @php
                                $str = $blog->tag;
                                $array_tags = explode(",",$str);
                            @endphp
                            <ul class="list">
                                @foreach ($array_tags as $tag)
                                    <li>
                                        <a href="#">{{ $tag }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Single End -->


@endsection
