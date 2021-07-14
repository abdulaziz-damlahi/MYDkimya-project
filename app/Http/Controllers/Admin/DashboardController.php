<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use App\Models\Admin\Counter;
use App\Models\Admin\Faq;
use App\Models\Admin\Feature;
use App\Models\Admin\Page;
use App\Models\Admin\Price;
use App\Models\Admin\Project;
use App\Models\Admin\Service;
use App\Models\Admin\Skill;
use App\Models\Admin\Sponsor;
use App\Models\Admin\Team;
use App\Models\Admin\Testimonial;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieving models for Landing Site
        $blogs_count = Blog::all()->count();
        $features_count = Feature::all()->count();
        $counters_count = Counter::all()->count();
        $services_count = Service::all()->count();
        $teams_count = Team::all()->count();
        $skills_count = Skill::all()->count();
        $projects_count = Project::all()->count();
        $sponsors_count = Sponsor::all()->count();
        $prices_count = Price::all()->count();
        $faqs_count = Faq::all()->count();
        $testimonials_count = Testimonial::all()->count();
        $pages_count = Page::all()->count();

        return view('admin.dashboard', compact('blogs_count',
            'features_count', 'counters_count', 'services_count', 'teams_count',
            'skills_count', 'projects_count', 'sponsors_count', 'prices_count',
            'faqs_count', 'testimonials_count', 'pages_count'));

    }

}
