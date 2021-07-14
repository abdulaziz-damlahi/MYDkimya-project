<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\About;
use App\Models\Admin\Blog;
use App\Models\Admin\BlogSection;
use App\Models\Admin\Contact;
use App\Models\Admin\ContactSection;
use App\Models\Admin\Counter;
use App\Models\Admin\Faq;
use App\Models\Admin\FaqSection;
use App\Models\Admin\Feature;
use App\Models\Admin\GoogleAnalytic;
use App\Models\Admin\Page;
use App\Models\Admin\Price;
use App\Models\Admin\Project;
use App\Models\Admin\ProjectSection;
use App\Models\Admin\Service;
use App\Models\Admin\ServiceSection;
use App\Models\Admin\SiteInfo;
use App\Models\Admin\Skill;
use App\Models\Admin\SkillSection;
use App\Models\Admin\Slider;
use App\Models\Admin\Social;
use App\Models\Admin\Sponsor;
use App\Models\Admin\Team;
use App\Models\Admin\TeamSection;
use App\Models\Admin\Testimonial;
use App\Models\Admin\TestimonialSection;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get site language
        $language = getSiteLanguage();

        // Retrieve models
        $site_info = SiteInfo::where('language_id', $language->id)->first();
        $google_analytic = GoogleAnalytic::first();
        $socials = Social::where('status', 1)->get();
        $sliders = Slider::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $features = Feature::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $about = About::where('language_id', $language->id)->first();
        $counters = Counter::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $service_section = ServiceSection::where('language_id', $language->id)->first();
        $services = Service::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $team_section = TeamSection::where('language_id', $language->id)->first();
        $teams = Team::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $skill_section = SkillSection::where('language_id', $language->id)->first();
        $skills = Skill::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $project_section = ProjectSection::where('language_id', $language->id)->first();
        $projects = Project::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $sponsors = Sponsor::orderBy('order', 'asc')->get();
        $prices = Price::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $testimonial_section = TestimonialSection::where('language_id', $language->id)->first();
        $testimonials = Testimonial::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $faq_section = FaqSection::where('language_id', $language->id)->first();
        $faqs = Faq::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $blog_section = BlogSection::where('language_id', $language->id)->first();
        $recent_posts = Blog::join("categories", 'categories.id', '=', 'blogs.category_id')
            ->where('categories.language_id', $language->id)
            ->where('categories.status', 1)
            ->where('blogs.status', 1)
            ->orderBy('blogs.id', 'desc')
            ->take(3)
            ->get();
        $contact_section = ContactSection::where('language_id', $language->id)->first();
        $contacts = Contact::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $pages = Page::where('language_id', $language->id)->where('status', 1)->orderBy('order', 'asc')->get();



        return view('frontend.home.index', compact( 'site_info', 'google_analytic',
            'socials', 'sliders', 'features', 'about', 'counters', 'service_section', 'services',
            'team_section', 'teams', 'skill_section', 'skills', 'project_section', 'projects',
            'sponsors', 'testimonial_section', 'testimonials', 'blog_section', 'recent_posts',
            'faq_section', 'faqs', 'prices', 'contact_section', 'contacts', 'pages'));
    }

}
