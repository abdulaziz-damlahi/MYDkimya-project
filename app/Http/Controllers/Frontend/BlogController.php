<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use App\Models\Admin\Breadcrumb;
use App\Models\Admin\Category;
use App\Models\Admin\Contact;
use App\Models\Admin\ContactSection;
use App\Models\Admin\GoogleAnalytic;
use App\Models\Admin\Page;
use App\Models\Admin\SiteInfo;
use App\Models\Admin\Social;
use App\Models\Admin\Sponsor;
use App\Models\Frontend\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
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

        // Retrieving models
        $site_info = SiteInfo::where('language_id', $language->id)->first();
        $google_analytic = GoogleAnalytic::first();
        $socials = Social::where('status', 1)->get();
        $sponsors = Sponsor::orderBy('order', 'asc')->get();
        $breadcrumb = Breadcrumb::first();
        $contact_section = ContactSection::where('language_id', $language->id)->first();
        $contacts = Contact::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $pages = Page::where('language_id', $language->id)->where('status', 1)->orderBy('order', 'asc')->get();
        $blogs = Blog::join("categories",'categories.id', '=', 'blogs.category_id')
            ->where('categories.language_id', $language->id)
            ->where('categories.status', 1)
            ->where('blogs.status', 1)
            ->orderBy('blogs.id', 'desc')
            ->paginate(6);

        return view('frontend.blog.index', compact( 'blogs', 'site_info', 'google_analytic',
            'socials', 'breadcrumb', 'sponsors', 'contact_section', 'contacts', 'pages'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        // Get site language
        $language = getSiteLanguage();

        // Retrieving models
        $site_info = SiteInfo::where('language_id', $language->id)->first();
        $google_analytic = GoogleAnalytic::first();
        $socials = Social::where('status', 1)->get();
        $breadcrumb = Breadcrumb::first();
        $contact_section = ContactSection::where('language_id', $language->id)->first();
        $contacts = Contact::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $pages = Page::where('language_id', $language->id)->where('status', 1)->orderBy('order', 'asc')->get();
        $blog = Blog::where('blogs.slug', '=', $slug)
            ->firstOrFail();
        $recent_posts = Blog::join("categories", 'categories.id', '=', 'blogs.category_id')
            ->where('categories.language_id', $language->id)
            ->where('categories.status', 1)
            ->where('blogs.status', 1)
            ->orderBy('blogs.id', 'desc')
            ->take(3)
            ->get();

        if(isset($blog)){
            // Update view column
            Blog::find($blog->id)->update(
                ['view' => $blog->view + 1]
            );
        }

        // Get comments
        $comments = Comment::where('blog_id', '=', $blog->id)->where('approval', '=', 1)->get();

        $blog_count_categories = Blog::select(DB::raw('count(*) as category_count, category_id'))
            ->where('language_id', $language->id)
            ->where('blogs.status', 1)
            ->groupBy('category_id')
            ->get();

        return view('frontend.blog.show', compact('blog', 'blog_count_categories', 'comments',
            'recent_posts','site_info', 'google_analytic', 'socials',
            'breadcrumb', 'contact_section', 'contacts', 'pages'));
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $category_name
     * @return \Illuminate\Http\Response
     */
    public function category_show($category_name)
    {
        // Get site language
        $language = getSiteLanguage();

        // Retrieving models
        $site_info = SiteInfo::where('language_id', $language->id)->first();
        $google_analytic = GoogleAnalytic::first();
        $socials = Social::where('status', 1)->get();
        $sponsors = Sponsor::orderBy('order', 'asc')->get();
        $breadcrumb = Breadcrumb::first();
        $contact_section = ContactSection::where('language_id', $language->id)->first();
        $contacts = Contact::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $pages = Page::where('language_id', $language->id)->where('status', 1)->orderBy('order', 'asc')->get();
        $blogs = Blog::join("categories",'categories.id', '=', 'blogs.category_id')
            ->where('categories.language_id', $language->id)
            ->where('categories.category_slug', '=', $category_name)
            ->where('blogs.status', 1)
            ->orderBy('blogs.id', 'desc')
            ->paginate(6);
        $category =  Category::where('language_id', $language->id)
        ->where('category_slug', '=', $category_name)->first();

        if (count($blogs) < 1) {
            abort(404);
        }

        return view('frontend.blog.category-show', compact('blogs', 'category',
            'breadcrumb', 'site_info', 'google_analytic', 'socials', 'breadcrumb',
            'sponsors', 'contact_section', 'contacts', 'pages'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // Get site language
        $language = getSiteLanguage();

        // Retrieving models
        $site_info = SiteInfo::where('language_id', $language->id)->first();
        $google_analytic = GoogleAnalytic::first();
        $socials = Social::where('status', 1)->get();
        $sponsors = Sponsor::orderBy('order', 'asc')->get();
        $breadcrumb = Breadcrumb::first();
        $contact_section = ContactSection::where('language_id', $language->id)->first();
        $contacts = Contact::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $pages = Page::where('language_id', $language->id)->where('status', 1)->orderBy('order', 'asc')->get();

        // Search
        $search = $request->get('search');

        $blogs = Blog::join("categories",'categories.id', '=', 'blogs.category_id')
            ->where('categories.language_id', $language->id)
            ->where('categories.status', 1)
            ->where('blogs.status', 1)
            ->where('title', 'like', '%'.$search.'%')
            ->orderBy('blogs.id', 'desc')
            ->get();

        return view('frontend.blog.search-index', compact ('blogs',
            'site_info', 'google_analytic', 'socials', 'breadcrumb', 'sponsors',
              'contact_section', 'contacts', 'pages'));
    }

}
