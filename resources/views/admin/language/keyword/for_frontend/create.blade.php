@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <div class="row">
        <div class="col-xl-12 height-card box-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">{{ __('content.for_frontend') }}</h4>
                    <ul class="nav nav-pills navtab-bg nav-justified">
                        <li class="nav-item">
                            <a href="#frontend1" data-toggle="tab" aria-expanded="false" class="nav-link mb-3">
                                {{ __('content.content_group') }} 1
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#frontend2" data-toggle="tab" aria-expanded="false" class="nav-link mb-3">
                                {{ __('content.content_group') }} 2
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane  show active" id="frontend1">
                            @if (isset($frontend_one_group_keyword))
                                <form action="{{ route('frontend-one-group-keyword.update_frontend_one_group_keyword', $frontend_one_group_keyword->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <input id="language_id" name="language_id" type="hidden" value="{{ $id }}">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="home">Home <span class="text-red">*</span></label>
                                                <input type="text" name="home" class="form-control" id="home" value="{{ $frontend_one_group_keyword->home }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="about">About <span class="text-red">*</span></label>
                                                <input type="text" name="about" class="form-control" id="about" value="{{ $frontend_one_group_keyword->about }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="services">Services <span class="text-red">*</span></label>
                                                <input type="text" name="services" class="form-control" id="services" value="{{ $frontend_one_group_keyword->services }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="teams">Teams <span class="text-red">*</span></label>
                                                <input type="text" name="teams" class="form-control" id="teams" value="{{ $frontend_one_group_keyword->teams }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="projects">Projects <span class="text-red">*</span></label>
                                                <input type="text" name="projects" class="form-control" id="projects" value="{{ $frontend_one_group_keyword->projects }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="news">News <span class="text-red">*</span></label>
                                                <input type="text" name="news" class="form-control" id="news" value="{{ $frontend_one_group_keyword->news }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="pricing">Pricing <span class="text-red">*</span></label>
                                                <input type="text" name="pricing" class="form-control" id="pricing" value="{{ $frontend_one_group_keyword->pricing }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="faqs">Faqs <span class="text-red">*</span></label>
                                                <input type="text" name="faqs" class="form-control" id="faqs" value="{{ $frontend_one_group_keyword->faqs }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="skills">Skills <span class="text-red">*</span></label>
                                                <input type="text" name="skills" class="form-control" id="skills" value="{{ $frontend_one_group_keyword->skills }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="contact">Contact <span class="text-red">*</span></label>
                                                <input type="text" name="contact" class="form-control" id="contact" value="{{ $frontend_one_group_keyword->contact }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="gallery">Gallery <span class="text-red">*</span></label>
                                                <input type="text" name="gallery" class="form-control" id="gallery" value="{{ $frontend_one_group_keyword->gallery }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="galleries">Galleries <span class="text-red">*</span></label>
                                                <input type="text" name="galleries" class="form-control" id="galleries" value="{{ $frontend_one_group_keyword->galleries }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="office_address">Office Address <span class="text-red">*</span></label>
                                                <input type="text" name="office_address" class="form-control" id="office_address" value="{{ $frontend_one_group_keyword->office_address }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="social_list">Social List <span class="text-red">*</span></label>
                                                <input type="text" name="social_list" class="form-control" id="social_list" value="{{ $frontend_one_group_keyword->social_list }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="read_more">Read More <span class="text-red">*</span></label>
                                                <input type="text" name="read_more" class="form-control" id="read_more" value="{{ $frontend_one_group_keyword->read_more }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="call_us_now">Call Us Now <span class="text-red">*</span></label>
                                                <input type="text" name="call_us_now" class="form-control" id="call_us_now" value="{{ $frontend_one_group_keyword->call_us_now }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="more_question">More Question? <span class="text-red">*</span></label>
                                                <input type="text" name="more_question" class="form-control" id="more_question" value="{{ $frontend_one_group_keyword->more_question }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="testimonials">Testimonials <span class="text-red">*</span></label>
                                                <input type="text" name="testimonials" class="form-control" id="testimonials" value="{{ $frontend_one_group_keyword->testimonials }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="all_news">All News <span class="text-red">*</span></label>
                                                <input type="text" name="all_news" class="form-control" id="all_news" value="{{ $frontend_one_group_keyword->all_news }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="your_message_has_been_delivered">Your message has been delivered. <span class="text-red">*</span></label>
                                                <input type="text" name="your_message_has_been_delivered" class="form-control" id="your_message_has_been_delivered" value="{{ $frontend_one_group_keyword->your_message_has_been_delivered }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="your_comment_is_pending_approval">Your comment is pending approval. <span class="text-red">*</span></label>
                                                <input type="text" name="your_comment_is_pending_approval" class="form-control" id="your_comment_is_pending_approval" value="{{ $frontend_one_group_keyword->your_comment_is_pending_approval }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="help">Help <span class="text-red">*</span></label>
                                                <input type="text" name="help" class="form-control" id="help" value="{{ $frontend_one_group_keyword->help }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="contact_info">Contact Info <span class="text-red">*</span></label>
                                                <input type="text" name="contact_info" class="form-control" id="contact_info" value="{{ $frontend_one_group_keyword->contact_info }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="submit_now">Submit Now <span class="text-red">*</span></label>
                                                <input type="text" name="submit_now" class="form-control" id="submit_now" value="{{ $frontend_one_group_keyword->submit_now }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="updating">Updating <span class="text-red">*</span></label>
                                                <input type="text" name="updating" class="form-control" id="updating" value="{{ $frontend_one_group_keyword->updating }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="all">All <span class="text-red">*</span></label>
                                                <input type="text" name="all" class="form-control" id="all" value="{{ $frontend_one_group_keyword->all }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="recent_posts">Recent Posts <span class="text-red">*</span></label>
                                                <input type="text" name="recent_posts" class="form-control" id="recent_posts" value="{{ $frontend_one_group_keyword->recent_posts }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="by">by <span class="text-red">*</span></label>
                                                <input type="text" name="by" class="form-control" id="by" value="{{ $frontend_one_group_keyword->by }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="pages">Pages <span class="text-red">*</span></label>
                                                <input type="text" name="pages" class="form-control" id="pages" value="{{ $frontend_one_group_keyword->pages }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="per_monthly">Per Monthly <span class="text-red">*</span></label>
                                                <input type="text" name="per_monthly" class="form-control" id="per_monthly" value="{{ $frontend_one_group_keyword->per_monthly }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="per_annual">Per Annual <span class="text-red">*</span></label>
                                                <input type="text" name="per_annual" class="form-control" id="per_annual" value="{{ $frontend_one_group_keyword->per_annual }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="comments">Comments <span class="text-red">*</span></label>
                                                <input type="text" name="comments" class="form-control" id="comments" value="{{ $frontend_one_group_keyword->comments }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <form action="{{ route('frontend-one-group-keyword.store_frontend_one_group_keyword') }}" method="POST">
                                    @csrf
                                    <input id="language_id" name="language_id" type="hidden" value="{{ $id }}">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="home">Home <span class="text-red">*</span></label>
                                                <input type="text" name="home" class="form-control" id="home" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="about">About <span class="text-red">*</span></label>
                                                <input type="text" name="about" class="form-control" id="about" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="services">Services <span class="text-red">*</span></label>
                                                <input type="text" name="services" class="form-control" id="services" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="teams">Teams <span class="text-red">*</span></label>
                                                <input type="text" name="teams" class="form-control" id="teams" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="projects">Projects <span class="text-red">*</span></label>
                                                <input type="text" name="projects" class="form-control" id="projects" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="news">News <span class="text-red">*</span></label>
                                                <input type="text" name="news" class="form-control" id="news" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="pricing">Pricing <span class="text-red">*</span></label>
                                                <input type="text" name="pricing" class="form-control" id="pricing" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="faqs">Faqs <span class="text-red">*</span></label>
                                                <input type="text" name="faqs" class="form-control" id="faqs" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="skills">Skills <span class="text-red">*</span></label>
                                                <input type="text" name="skills" class="form-control" id="skills" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="contact">Contact <span class="text-red">*</span></label>
                                                <input type="text" name="contact" class="form-control" id="contact" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="gallery">Gallery <span class="text-red">*</span></label>
                                                <input type="text" name="gallery" class="form-control" id="gallery" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="galleries">Galleries <span class="text-red">*</span></label>
                                                <input type="text" name="galleries" class="form-control" id="galleries" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="office_address">Office Address <span class="text-red">*</span></label>
                                                <input type="text" name="office_address" class="form-control" id="office_address" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="social_list">Social List <span class="text-red">*</span></label>
                                                <input type="text" name="social_list" class="form-control" id="social_list" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="read_more">Read More <span class="text-red">*</span></label>
                                                <input type="text" name="read_more" class="form-control" id="read_more" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="call_us_now">Call Us Now <span class="text-red">*</span></label>
                                                <input type="text" name="call_us_now" class="form-control" id="call_us_now" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="more_question">More Question? <span class="text-red">*</span></label>
                                                <input type="text" name="more_question" class="form-control" id="more_question" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="testimonials">Testimonials <span class="text-red">*</span></label>
                                                <input type="text" name="testimonials" class="form-control" id="testimonials" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="all_news">All News <span class="text-red">*</span></label>
                                                <input type="text" name="all_news" class="form-control" id="all_news" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="your_message_has_been_delivered">Your message has been delivered. <span class="text-red">*</span></label>
                                                <input type="text" name="your_message_has_been_delivered" class="form-control" id="your_message_has_been_delivered" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="your_comment_is_pending_approval">Your comment is pending approval. <span class="text-red">*</span></label>
                                                <input type="text" name="your_comment_is_pending_approval" class="form-control" id="your_comment_is_pending_approval" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="help">Help <span class="text-red">*</span></label>
                                                <input type="text" name="help" class="form-control" id="help" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="contact_info">Contact Info <span class="text-red">*</span></label>
                                                <input type="text" name="contact_info" class="form-control" id="contact_info" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="submit_now">Submit Now <span class="text-red">*</span></label>
                                                <input type="text" name="submit_now" class="form-control" id="submit_now" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="updating">Updating <span class="text-red">*</span></label>
                                                <input type="text" name="updating" class="form-control" id="updating" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="all">All <span class="text-red">*</span></label>
                                                <input type="text" name="all" class="form-control" id="all" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="recent_posts">Recent Posts <span class="text-red">*</span></label>
                                                <input type="text" name="recent_posts" class="form-control" id="recent_posts" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="by">by <span class="text-red">*</span></label>
                                                <input type="text" name="by" class="form-control" id="by" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="pages">Pages <span class="text-red">*</span></label>
                                                <input type="text" name="pages" class="form-control" id="pages" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="per_monthly">Per Monthly <span class="text-red">*</span></label>
                                                <input type="text" name="per_monthly" class="form-control" id="per_monthly" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="per_annual">Per Annual <span class="text-red">*</span></label>
                                                <input type="text" name="per_annual" class="form-control" id="per_annual" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="comments">Comments <span class="text-red">*</span></label>
                                                <input type="text" name="comments" class="form-control" id="comments" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        </div>
                        <div class="tab-pane" id="frontend2">
                            @if (isset($frontend_two_group_keyword))
                                <form action="{{ route('frontend-two-group-keyword.update_frontend_two_group_keyword', $frontend_two_group_keyword->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <input id="language_id" name="language_id" type="hidden" value="{{ $id }}">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="leave_a_comment">Leave A Comment <span class="text-red">*</span></label>
                                                <input type="text" name="leave_a_comment" class="form-control" id="leave_a_comment" value="{{ $frontend_two_group_keyword->leave_a_comment }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="your_name">Your Name * <span class="text-red">*</span></label>
                                                <input type="text" name="your_name" class="form-control" id="your_name" value="{{ $frontend_two_group_keyword->your_name }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="your_email">Your Email * <span class="text-red">*</span></label>
                                                <input type="text" name="your_email" class="form-control" id="your_email" value="{{ $frontend_two_group_keyword->your_email }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="your_comment">Your Comment * <span class="text-red">*</span></label>
                                                <input type="text" name="your_comment" class="form-control" id="your_comment" value="{{ $frontend_two_group_keyword->your_comment }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="post_comment">Post Comment <span class="text-red">*</span></label>
                                                <input type="text" name="post_comment" class="form-control" id="post_comment" value="{{ $frontend_two_group_keyword->post_comment }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="search">Search <span class="text-red">*</span></label>
                                                <input type="text" name="search" class="form-control" id="search" value="{{ $frontend_two_group_keyword->search }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="search_results">Search Results <span class="text-red">*</span></label>
                                                <input type="text" name="search_results" class="form-control" id="search_results" value="{{ $frontend_two_group_keyword->search_results }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="search_here">Search Here <span class="text-red">*</span></label>
                                                <input type="text" name="search_here" class="form-control" id="search_here" value="{{ $frontend_two_group_keyword->search_here }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="nothing_found">Nothing Found <span class="text-red">*</span></label>
                                                <input type="text" name="nothing_found" class="form-control" id="nothing_found" value="{{ $frontend_two_group_keyword->nothing_found }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="categories">Categories <span class="text-red">*</span></label>
                                                <input type="text" name="categories" class="form-control" id="categories" value="{{ $frontend_two_group_keyword->categories }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="links">Links <span class="text-red">*</span></label>
                                                <input type="text" name="links" class="form-control" id="links" value="{{ $frontend_two_group_keyword->links }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="contact_us">Contact Us <span class="text-red">*</span></label>
                                                <input type="text" name="contact_us" class="form-control" id="contact_us" value="{{ $frontend_two_group_keyword->contact_us }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="view_more">View More <span class="text-red">*</span></label>
                                                <input type="text" name="view_more" class="form-control" id="view_more" value="{{ $frontend_two_group_keyword->view_more }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="name">Name <span class="text-red">*</span></label>
                                                <input type="text" name="name" class="form-control" id="name" value="{{ $frontend_two_group_keyword->name }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="email">Email <span class="text-red">*</span></label>
                                                <input type="text" name="email" class="form-control" id="email" value="{{ $frontend_two_group_keyword->email }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="subject">Subject <span class="text-red">*</span></label>
                                                <input type="text" name="subject" class="form-control" id="subject" value="{{ $frontend_two_group_keyword->subject }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="message">Message <span class="text-red">*</span></label>
                                                <input type="text" name="message" class="form-control" id="message" value="{{ $frontend_two_group_keyword->message }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="tags">Tags <span class="text-red">*</span></label>
                                                <input type="text" name="tags" class="form-control" id="tags" value="{{ $frontend_two_group_keyword->tags }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="admin">Admin <span class="text-red">*</span></label>
                                                <input type="text" name="admin" class="form-control" id="admin" value="{{ $frontend_two_group_keyword->admin }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <form action="{{ route('frontend-two-group-keyword.store_frontend_two_group_keyword') }}" method="POST">
                                    @csrf
                                    <input id="language_id" name="language_id" type="hidden" value="{{ $id }}">
                                    <div class="row">
                                        <div class="col-md-3">

                                            <div class="form-group">
                                                <label for="leave_a_comment">Leave A Comment <span class="text-red">*</span></label>
                                                <input type="text" name="leave_a_comment" class="form-control" id="leave_a_comment" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="your_name">Your Name * <span class="text-red">*</span></label>
                                                <input type="text" name="your_name" class="form-control" id="your_name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="your_email">Your Email * <span class="text-red">*</span></label>
                                                <input type="text" name="your_email" class="form-control" id="your_email" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="your_comment">Your Comment * <span class="text-red">*</span></label>
                                                <input type="text" name="your_comment" class="form-control" id="your_comment" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="post_comment">Post Comment <span class="text-red">*</span></label>
                                                <input type="text" name="post_comment" class="form-control" id="post_comment" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="search">Search <span class="text-red">*</span></label>
                                                <input type="text" name="search" class="form-control" id="search" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="search_results">Search Results <span class="text-red">*</span></label>
                                                <input type="text" name="search_results" class="form-control" id="search_results" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="search_here">Search Here <span class="text-red">*</span></label>
                                                <input type="text" name="search_here" class="form-control" id="search_here" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="nothing_found">Nothing Found <span class="text-red">*</span></label>
                                                <input type="text" name="nothing_found" class="form-control" id="nothing_found" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="categories">Categories <span class="text-red">*</span></label>
                                                <input type="text" name="categories" class="form-control" id="categories" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="links">Links <span class="text-red">*</span></label>
                                                <input type="text" name="links" class="form-control" id="links" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="contact_us">Contact Us <span class="text-red">*</span></label>
                                                <input type="text" name="contact_us" class="form-control" id="contact_us" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="view_more">View More <span class="text-red">*</span></label>
                                                <input type="text" name="view_more" class="form-control" id="view_more" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="name">Name <span class="text-red">*</span></label>
                                                <input type="text" name="name" class="form-control" id="name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="email">Email <span class="text-red">*</span></label>
                                                <input type="text" name="email" class="form-control" id="email" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="subject">Subject <span class="text-red">*</span></label>
                                                <input type="text" name="subject" class="form-control" id="subject" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="message">Message <span class="text-red">*</span></label>
                                                <input type="text" name="message" class="form-control" id="message" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="tags">Tags <span class="text-red">*</span></label>
                                                <input type="text" name="tags" class="form-control" id="tags" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="admin">Admin <span class="text-red">*</span></label>
                                                <input type="text" name="admin" class="form-control" id="admin" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>

@endsection