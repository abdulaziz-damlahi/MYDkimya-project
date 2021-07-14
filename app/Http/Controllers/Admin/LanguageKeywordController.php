<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ContentFiveGroupKeyword;
use App\Models\Admin\ContentFourGroupKeyword;
use App\Models\Admin\ContentOneGroupKeyword;
use App\Models\Admin\ContentSixGroupKeyword;
use App\Models\Admin\ContentThreeGroupKeyword;
use App\Models\Admin\ContentTwoGroupKeyword;
use App\Models\Admin\FrontendOneGroupKeyword;
use App\Models\Admin\FrontendTwoGroupKeyword;
use App\Models\Admin\MenuKeyword;
use Illuminate\Http\Request;

class LanguageKeywordController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // Retrieving a model
        $menu_keyword = MenuKeyword::where('language_id', $id)->first();
        $content_one_group_keyword = ContentOneGroupKeyword::where('language_id', $id)->first();
        $content_two_group_keyword = ContentTwoGroupKeyword::where('language_id', $id)->first();
        $content_three_group_keyword = ContentThreeGroupKeyword::where('language_id', $id)->first();
        $content_four_group_keyword = ContentFourGroupKeyword::where('language_id', $id)->first();
        $content_five_group_keyword = ContentFiveGroupKeyword::where('language_id', $id)->first();
        $content_six_group_keyword = ContentSixGroupKeyword::where('language_id', $id)->first();

        return view('admin.language.keyword.for_adminpanel.create', compact('id', 'menu_keyword',
            'content_one_group_keyword', 'content_two_group_keyword', 'content_three_group_keyword',
            'content_four_group_keyword', 'content_five_group_keyword', 'content_six_group_keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function frontend_create($id)
    {
        // Retrieving a model
        $frontend_one_group_keyword = FrontendOneGroupKeyword::where('language_id', $id)->first();
        $frontend_two_group_keyword = FrontendTwoGroupKeyword::where('language_id', $id)->first();

        return view('admin.language.keyword.for_frontend.create', compact('id',
            'frontend_one_group_keyword', 'frontend_two_group_keyword'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_menu_keyword(Request $request)
    {
        // Form validation
        $request->validate([
            'language_id' => 'required|unique:menu_keywords',
            'dashboard' => 'required',
            'banner' => 'required',
            'sliders' => 'required',
            'categories' => 'required',
            'blogs' => 'required',
            'features' => 'required',
            'about' => 'required',
            'counters' => 'required',
            'services' => 'required',
            'teams' => 'required',
            'skills' => 'required',
            'projects' => 'required',
            'sponsors' => 'required',
            'prices' => 'required',
            'faqs' => 'required',
            'testimonials' => 'required',
            'contact' => 'required',
            'contact_info' => 'required',
            'socials' => 'required',
            'messages' => 'required',
            'pages' => 'required',
            'settings' => 'required',
            'site_info' => 'required',
            'site_images' => 'required',
            'homepage_versions' => 'required',
            'google_analytic' => 'required',
            'external_url' => 'required',
            'breadcrumb' => 'required',
            'sections' => 'required',
            'seo' => 'required',
            'languages' => 'required',
            'optimizer' => 'required',
            'logout' => 'required',
            'notifications' => 'required',
            'profile' => 'required',
            'change_password' => 'required',
            'data_language' => 'required',
            'comments' => 'required',
            'galleries' => 'required',
            'which_language' => 'required',
            'reminding' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        MenuKeyword::firstOrCreate([
            'language_id' => $input['language_id'],
            'dashboard' => $input['dashboard'],
            'banner' => $input['banner'],
            'sliders' => $input['sliders'],
            'categories' => $input['categories'],
            'blogs' => $input['blogs'],
            'features' => $input['features'],
            'about' => $input['about'],
            'counters' => $input['counters'],
            'services' => $input['services'],
            'teams' => $input['teams'],
            'skills' => $input['skills'],
            'projects' => $input['projects'],
            'sponsors' => $input['sponsors'],
            'prices' => $input['prices'],
            'faqs' => $input['faqs'],
            'testimonials' => $input['testimonials'],
            'contact' => $input['contact'],
            'contact_info' => $input['contact_info'],
            'socials' => $input['socials'],
            'messages' => $input['messages'],
            'pages' => $input['pages'],
            'settings' => $input['settings'],
            'site_info' => $input['site_info'],
            'site_images' => $input['site_images'],
            'homepage_versions' => $input['homepage_versions'],
            'google_analytic' => $input['google_analytic'],
            'external_url' => $input['external_url'],
            'breadcrumb' => $input['breadcrumb'],
            'sections' => $input['sections'],
            'seo' => $input['seo'],
            'languages' => $input['languages'],
            'optimizer' => $input['optimizer'],
            'logout' => $input['logout'],
            'notifications' => $input['notifications'],
            'profile' => $input['profile'],
            'change_password' => $input['change_password'],
            'data_language' => $input['data_language'],
            'comments' => $input['comments'],
            'galleries' => $input['galleries'],
            'which_language' => $input['which_language'],
            'reminding' => $input['reminding'],
        ]);

        return redirect()->route('language-keyword-for-adminpanel.create', $input['language_id'])
            ->with('success', 'content.created_successfully');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_menu_keyword(Request $request, $id)
    {
        // Form validation
        $request->validate([
            'language_id' => 'required|integer',
            'dashboard' => 'required',
            'banner' => 'required',
            'sliders' => 'required',
            'categories' => 'required',
            'blogs' => 'required',
            'features' => 'required',
            'about' => 'required',
            'counters' => 'required',
            'services' => 'required',
            'teams' => 'required',
            'skills' => 'required',
            'projects' => 'required',
            'sponsors' => 'required',
            'prices' => 'required',
            'faqs' => 'required',
            'testimonials' => 'required',
            'contact' => 'required',
            'contact_info' => 'required',
            'socials' => 'required',
            'messages' => 'required',
            'pages' => 'required',
            'settings' => 'required',
            'site_info' => 'required',
            'site_images' => 'required',
            'homepage_versions' => 'required',
            'google_analytic' => 'required',
            'external_url' => 'required',
            'breadcrumb' => 'required',
            'sections' => 'required',
            'seo' => 'required',
            'languages' => 'required',
            'optimizer' => 'required',
            'logout' => 'required',
            'notifications' => 'required',
            'profile' => 'required',
            'change_password' => 'required',
            'data_language' => 'required',
            'comments' => 'required',
            'galleries' => 'required',
            'which_language' => 'required',
            'reminding' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        $menu_keyword = MenuKeyword::where('language_id', $id)->first();

        // Update to database
        MenuKeyword::find($menu_keyword->id)->update($input);

        return redirect()->route('language-keyword-for-adminpanel.create', $input['language_id'])
            ->with('success', 'content.updated_successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_content_one_group_keyword(Request $request)
    {
        // Form validation
        $request->validate([
            'language_id' => 'required|unique:content_one_group_keywords',
            'sliders' => 'required',
            'add_slider' => 'required',
            'edit_slider' => 'required',
            'add_new' => 'required',
            'title' => 'required',
            'desc' => 'required',
            'btn_name' => 'required',
            'btn_link' => 'required',
            'order' => 'required',
            'image' => 'required',
            'size' => 'required',
            'recommended_size' => 'required',
            'submit' => 'required',
            'action' => 'required',
            'created_successfully' => 'required',
            'updated_successfully' => 'required',
            'deleted_successfully' => 'required',
            'current_image' => 'required',
            'not_yet_created' => 'required',
            'delete' => 'required',
            'close' => 'required',
            'you_wont_be_able_to_revert_this' => 'required',
            'cancel' => 'required',
            'yes_delete_it' => 'required',
            'categories' => 'required',
            'add_category' => 'required',
            'edit_category' => 'required',
            'category_name' => 'required',
            'status' => 'required',
            'select_your_option' => 'required',
            'enable' => 'required',
            'disable' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        ContentOneGroupKeyword::firstOrCreate([
            'language_id' => $input['language_id'],
            'sliders' => $input['sliders'],
            'add_slider' => $input['add_slider'],
            'edit_slider' => $input['edit_slider'],
            'add_new' => $input['add_new'],
            'title' => $input['title'],
            'desc' => $input['desc'],
            'btn_name' => $input['btn_name'],
            'btn_link' => $input['btn_link'],
            'order' => $input['order'],
            'image' => $input['image'],
            'size' => $input['size'],
            'recommended_size' => $input['recommended_size'],
            'submit' => $input['submit'],
            'action' => $input['action'],
            'created_successfully' => $input['created_successfully'],
            'updated_successfully' => $input['updated_successfully'],
            'deleted_successfully' => $input['deleted_successfully'],
            'current_image' => $input['current_image'],
            'not_yet_created' => $input['not_yet_created'],
            'delete' => $input['delete'],
            'close' => $input['close'],
            'you_wont_be_able_to_revert_this' => $input['you_wont_be_able_to_revert_this'],
            'cancel' => $input['cancel'],
            'yes_delete_it' => $input['yes_delete_it'],
            'categories' => $input['categories'],
            'add_category' => $input['add_category'],
            'edit_category' => $input['edit_category'],
            'category_name' => $input['category_name'],
            'status' => $input['status'],
            'select_your_option' => $input['select_your_option'],
            'enable' => $input['enable'],
            'disable' => $input['disable'],
        ]);

        return redirect()->route('language-keyword-for-adminpanel.create', $input['language_id'])
            ->with('success', 'content.created_successfully');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_content_one_group_keyword(Request $request, $id)
    {
        // Form validation
        $request->validate([
            'language_id' => 'required|integer',
            'sliders' => 'required',
            'add_slider' => 'required',
            'edit_slider' => 'required',
            'add_new' => 'required',
            'title' => 'required',
            'desc' => 'required',
            'btn_name' => 'required',
            'btn_link' => 'required',
            'order' => 'required',
            'image' => 'required',
            'size' => 'required',
            'recommended_size' => 'required',
            'submit' => 'required',
            'action' => 'required',
            'created_successfully' => 'required',
            'updated_successfully' => 'required',
            'deleted_successfully' => 'required',
            'current_image' => 'required',
            'not_yet_created' => 'required',
            'delete' => 'required',
            'close' => 'required',
            'you_wont_be_able_to_revert_this' => 'required',
            'cancel' => 'required',
            'yes_delete_it' => 'required',
            'categories' => 'required',
            'add_category' => 'required',
            'edit_category' => 'required',
            'category_name' => 'required',
            'status' => 'required',
            'select_your_option' => 'required',
            'enable' => 'required',
            'disable' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        $content_one_group_keyword = ContentOneGroupKeyword::where('language_id', $id)->first();

        // Update to database
        ContentOneGroupKeyword::find($content_one_group_keyword->id)->update($input);

        return redirect()->route('language-keyword-for-adminpanel.create', $input['language_id'])
            ->with('success', 'content.updated_successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_content_two_group_keyword(Request $request)
    {
        // Form validation
        $request->validate([
            'language_id' => 'required|unique:content_two_group_keywords',
            'section_title_and_desc' => 'required',
            'top_title' => 'required',
            'blogs' => 'required',
            'add_blog' => 'required',
            'edit_blog' => 'required',
            'short_desc' => 'required',
            'tag' => 'required',
            'seperate_with_commas' => 'required',
            'author' => 'required',
            'category' => 'required',
            'post_date' => 'required',
            'view' => 'required',
            'features' => 'required',
            'add_feature' => 'required',
            'edit_feature' => 'required',
            'about' => 'required',
            'counters' => 'required',
            'add_counter' => 'required',
            'edit_counter' => 'required',
            'icon' => 'required',
            'timer' => 'required',
            'services' => 'required',
            'add_service' => 'required',
            'edit_service' => 'required',
            'teams' => 'required',
            'add_team' => 'required',
            'edit_team' => 'required',
            'name' => 'required',
            'job' => 'required',
            'skills' => 'required',
            'add_skill' => 'required',
            'edit_skill' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        ContentTwoGroupKeyword::firstOrCreate([
            'language_id' => $input['language_id'],
            'section_title_and_desc' => $input['section_title_and_desc'],
            'top_title' => $input['top_title'],
            'blogs' => $input['blogs'],
            'add_blog' => $input['add_blog'],
            'edit_blog' => $input['edit_blog'],
            'short_desc' => $input['short_desc'],
            'tag' => $input['tag'],
            'seperate_with_commas' => $input['seperate_with_commas'],
            'author' => $input['author'],
            'category' => $input['category'],
            'post_date' => $input['post_date'],
            'view' => $input['view'],
            'features' => $input['features'],
            'add_feature' => $input['add_feature'],
            'edit_feature' => $input['edit_feature'],
            'about' => $input['about'],
            'counters' => $input['counters'],
            'add_counter' => $input['add_counter'],
            'edit_counter' => $input['edit_counter'],
            'icon' => $input['icon'],
            'timer' => $input['timer'],
            'services' => $input['services'],
            'add_service' => $input['add_service'],
            'edit_service' => $input['edit_service'],
            'teams' => $input['teams'],
            'add_team' => $input['add_team'],
            'edit_team' => $input['edit_team'],
            'name' => $input['name'],
            'job' => $input['job'],
            'skills' => $input['skills'],
            'add_skill' => $input['add_skill'],
            'edit_skill' => $input['edit_skill'],
        ]);

        return redirect()->route('language-keyword-for-adminpanel.create', $input['language_id'])
            ->with('success', 'content.created_successfully');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_content_two_group_keyword(Request $request, $id)
    {
        // Form validation
        $request->validate([
            'language_id' => 'required|integer',
            'section_title_and_desc' => 'required',
            'top_title' => 'required',
            'blogs' => 'required',
            'add_blog' => 'required',
            'edit_blog' => 'required',
            'short_desc' => 'required',
            'tag' => 'required',
            'seperate_with_commas' => 'required',
            'author' => 'required',
            'category' => 'required',
            'post_date' => 'required',
            'view' => 'required',
            'features' => 'required',
            'add_feature' => 'required',
            'edit_feature' => 'required',
            'about' => 'required',
            'counters' => 'required',
            'add_counter' => 'required',
            'edit_counter' => 'required',
            'icon' => 'required',
            'timer' => 'required',
            'services' => 'required',
            'add_service' => 'required',
            'edit_service' => 'required',
            'teams' => 'required',
            'add_team' => 'required',
            'edit_team' => 'required',
            'name' => 'required',
            'job' => 'required',
            'skills' => 'required',
            'add_skill' => 'required',
            'edit_skill' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        $content_two_group_keyword = ContentTwoGroupKeyword::where('language_id', $id)->first();

        // Update to database
        ContentTwoGroupKeyword::find($content_two_group_keyword->id)->update($input);

        return redirect()->route('language-keyword-for-adminpanel.create', $input['language_id'])
            ->with('success', 'content.updated_successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_content_three_group_keyword(Request $request)
    {
        // Form validation
        $request->validate([
            'language_id' => 'required|unique:content_three_group_keywords',
            'percent_rate' => 'required',
            'projects'=> 'required',
            'add_project'=> 'required',
            'edit_project'=> 'required',
            'sponsors'=> 'required',
            'add_sponsor'=> 'required',
            'edit_sponsor'=> 'required',
            'prices'=> 'required',
            'add_price'=> 'required',
            'edit_price'=> 'required',
            'currency'=> 'required',
            'price'=> 'required',
            'time'=> 'required',
            'monthly'=> 'required',
            'annually'=> 'required',
            'please_take_with_features_semicolon'=> 'required',
            'faqs'=> 'required',
            'add_faqs'=> 'required',
            'edit_faqs'=> 'required',
            'question'=> 'required',
            'answer'=> 'required',
            'testimonials'=> 'required',
            'add_testimonial'=> 'required',
            'edit_testimonial'=> 'required',
            'shadow_text'=> 'required',
            'star'=> 'required',
            'galleries'=> 'required',
            'add_gallery'=> 'required',
            'edit_gallery'=> 'required',
            'pages'=> 'required',
            'add_page'=> 'required',
            'edit_page'=> 'required',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        ContentThreeGroupKeyword::firstOrCreate([
            'language_id' => $input['language_id'],
            'percent_rate' => $input['percent_rate'],
            'projects' => $input['projects'],
            'add_project' => $input['add_project'],
            'edit_project' => $input['edit_project'],
            'sponsors' => $input['sponsors'],
            'add_sponsor' => $input['add_sponsor'],
            'edit_sponsor' => $input['edit_sponsor'],
            'prices' => $input['prices'],
            'add_price' => $input['add_price'],
            'edit_price' => $input['edit_price'],
            'currency' => $input['currency'],
            'price' => $input['price'],
            'time' => $input['time'],
            'monthly' => $input['monthly'],
            'annually' => $input['annually'],
            'please_take_with_features_semicolon' => $input['please_take_with_features_semicolon'],
            'faqs' => $input['faqs'],
            'add_faqs' => $input['add_faqs'],
            'edit_faqs' => $input['edit_faqs'],
            'question' => $input['question'],
            'answer' => $input['answer'],
            'testimonials' => $input['testimonials'],
            'add_testimonial' => $input['add_testimonial'],
            'edit_testimonial' => $input['edit_testimonial'],
            'shadow_text' => $input['shadow_text'],
            'star' => $input['star'],
            'galleries' => $input['galleries'],
            'add_gallery' => $input['add_gallery'],
            'edit_gallery' => $input['edit_gallery'],
            'pages' => $input['pages'],
            'add_page' => $input['add_page'],
            'edit_page' => $input['edit_page'],
        ]);

        return redirect()->route('language-keyword-for-adminpanel.create', $input['language_id'])
            ->with('success', 'content.created_successfully');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_content_three_group_keyword(Request $request, $id)
    {
        // Form validation
        $request->validate([
            'language_id' => 'required|integer',
            'percent_rate' => 'required',
            'projects'=> 'required',
            'add_project'=> 'required',
            'edit_project'=> 'required',
            'sponsors'=> 'required',
            'add_sponsor'=> 'required',
            'edit_sponsor'=> 'required',
            'prices'=> 'required',
            'add_price'=> 'required',
            'edit_price'=> 'required',
            'currency'=> 'required',
            'price'=> 'required',
            'time'=> 'required',
            'monthly'=> 'required',
            'annually'=> 'required',
            'please_take_with_features_semicolon'=> 'required',
            'faqs'=> 'required',
            'add_faqs'=> 'required',
            'edit_faqs'=> 'required',
            'question'=> 'required',
            'answer'=> 'required',
            'testimonials'=> 'required',
            'add_testimonial'=> 'required',
            'edit_testimonial'=> 'required',
            'shadow_text'=> 'required',
            'star'=> 'required',
            'galleries'=> 'required',
            'add_gallery'=> 'required',
            'edit_gallery'=> 'required',
            'pages'=> 'required',
            'add_page'=> 'required',
            'edit_page'=> 'required',
        ]);

        // Get All Request
        $input = $request->all();

        $content_three_group_keyword = ContentThreeGroupKeyword::where('language_id', $id)->first();

        // Update to database
        ContentThreeGroupKeyword::find($content_three_group_keyword->id)->update($input);

        return redirect()->route('language-keyword-for-adminpanel.create', $input['language_id'])
            ->with('success', 'content.updated_successfully');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_content_four_group_keyword(Request $request)
    {
        // Form validation
        $request->validate([
            'language_id' => 'required|unique:content_four_group_keywords',
            'map_iframe' => 'required',
            'map_iframe_desc_placeholder' => 'required',
            'contact' => 'required',
            'add_contact' => 'required',
            'edit_contact' => 'required',
            'socials' => 'required',
            'add_social' => 'required',
            'edit_social' => 'required',
            'link' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
            'read_status' => 'required',
            'mark_all_as_read' => 'required',
            'mark' => 'required',
            'messages' => 'required',
            'site_info' => 'required',
            'copyright' => 'required',
            'address' => 'required',
            'address_map_link' => 'required',
            'phone' => 'required',
            'site_images' => 'required',
            'favicon' => 'required',
            'admin_logo' => 'required',
            'admin_small_logo_image' => 'required',
            'site_white_logo_image' => 'required',
            'site_colored_logo_image' => 'required',
            'google_analytic' => 'required',
            'external_url' => 'required',
            'breadcrumb' => 'required',
            'sections' => 'required',
            'seo' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        ContentFourGroupKeyword::firstOrCreate([
            'language_id' => $input['language_id'],
            'map_iframe' => $input['map_iframe'],
            'map_iframe_desc_placeholder' => $input['map_iframe_desc_placeholder'],
            'contact' => $input['contact'],
            'add_contact' => $input['add_contact'],
            'edit_contact' => $input['edit_contact'],
            'socials' => $input['socials'],
            'add_social' => $input['add_social'],
            'edit_social' => $input['edit_social'],
            'link' => $input['link'],
            'email' => $input['email'],
            'subject' => $input['subject'],
            'message' => $input['message'],
            'read_status' => $input['read_status'],
            'mark_all_as_read' => $input['mark_all_as_read'],
            'mark' => $input['mark'],
            'messages' => $input['messages'],
            'site_info' => $input['site_info'],
            'copyright' => $input['copyright'],
            'address' => $input['address'],
            'address_map_link' => $input['address_map_link'],
            'phone' => $input['phone'],
            'site_images' => $input['site_images'],
            'favicon' => $input['favicon'],
            'admin_logo' => $input['admin_logo'],
            'admin_small_logo_image' => $input['admin_small_logo_image'],
            'site_white_logo_image' => $input['site_white_logo_image'],
            'site_colored_logo_image' => $input['site_colored_logo_image'],
            'google_analytic' => $input['google_analytic'],
            'external_url' => $input['external_url'],
            'breadcrumb' => $input['breadcrumb'],
            'sections' => $input['sections'],
            'seo' => $input['seo'],
        ]);

        return redirect()->route('language-keyword-for-adminpanel.create', $input['language_id'])
            ->with('success', 'content.created_successfully');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_content_four_group_keyword(Request $request, $id)
    {
        // Form validation
        $request->validate([
            'language_id' => 'required|integer',
            'map_iframe' => 'required',
            'map_iframe_desc_placeholder' => 'required',
            'contact' => 'required',
            'add_contact' => 'required',
            'edit_contact' => 'required',
            'socials' => 'required',
            'add_social' => 'required',
            'edit_social' => 'required',
            'link' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
            'read_status' => 'required',
            'mark_all_as_read' => 'required',
            'mark' => 'required',
            'messages' => 'required',
            'site_info' => 'required',
            'copyright' => 'required',
            'address' => 'required',
            'address_map_link' => 'required',
            'phone' => 'required',
            'site_images' => 'required',
            'favicon' => 'required',
            'admin_logo' => 'required',
            'admin_small_logo_image' => 'required',
            'site_white_logo_image' => 'required',
            'site_colored_logo_image' => 'required',
            'google_analytic' => 'required',
            'external_url' => 'required',
            'breadcrumb' => 'required',
            'sections' => 'required',
            'seo' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        $content_four_group_keyword = ContentFourGroupKeyword::where('language_id', $id)->first();

        // Update to database
        ContentFourGroupKeyword::find($content_four_group_keyword->id)->update($input);

        return redirect()->route('language-keyword-for-adminpanel.create', $input['language_id'])
            ->with('success', 'content.updated_successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_content_five_group_keyword(Request $request)
    {
        // Form validation
        $request->validate([
            'language_id' => 'required|unique:content_five_group_keywords',
            'site_name' => 'required',
            'site_desc' => 'required',
            'site_keywords' => 'required',
            'please_create_a_category' => 'required',
            'languages' => 'required',
            'add_language' => 'required',
            'edit_language' => 'required',
            'language_name' => 'required',
            'language_code' => 'required',
            'direction' => 'required',
            'keywords' => 'required',
            'for_admin_panel' => 'required',
            'for_frontend' => 'required',
            'content_group' => 'required',
            'menu' => 'required',
            'hide' => 'required',
            'show' => 'required',
            'yes' => 'required',
            'no' => 'required',
            'display_footer_menu' => 'required',
            'display_dropdown' => 'required',
            'default_site_language' => 'required',
            'please_try_again' => 'required',
            'you_are_not_authorized' => 'required',
            'comment' => 'required',
            'comments' => 'required',
            'approval_status' => 'required',
            'mark_all_as_approval' => 'required',
            'read' => 'required',
            'unread' => 'required',
            'profile' => 'required',
            'change_password' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        ContentFiveGroupKeyword::firstOrCreate([
            'language_id' => $input['language_id'],
            'site_name' => $input['site_name'],
            'site_desc' => $input['site_desc'],
            'site_keywords' => $input['site_keywords'],
            'please_create_a_category' => $input['please_create_a_category'],
            'languages' => $input['languages'],
            'add_language' => $input['add_language'],
            'edit_language' => $input['edit_language'],
            'language_name' => $input['language_name'],
            'language_code' => $input['language_code'],
            'direction' => $input['direction'],
            'keywords' => $input['keywords'],
            'for_admin_panel' => $input['for_admin_panel'],
            'for_frontend' => $input['for_frontend'],
            'content_group' => $input['content_group'],
            'menu' => $input['menu'],
            'hide' => $input['hide'],
            'show' => $input['show'],
            'yes' => $input['yes'],
            'no' => $input['no'],
            'display_footer_menu' => $input['display_footer_menu'],
            'display_dropdown' => $input['display_dropdown'],
            'default_site_language' => $input['default_site_language'],
            'please_try_again' => $input['please_try_again'],
            'you_are_not_authorized' => $input['you_are_not_authorized'],
            'comment' => $input['comment'],
            'comments' => $input['comments'],
            'approval_status' => $input['approval_status'],
            'mark_all_as_approval' => $input['mark_all_as_approval'],
            'read' => $input['read'],
            'unread' => $input['unread'],
            'profile' => $input['profile'],
            'change_password' => $input['change_password'],
        ]);

        return redirect()->route('language-keyword-for-adminpanel.create', $input['language_id'])
            ->with('success', 'content.created_successfully');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_content_five_group_keyword(Request $request, $id)
    {
        // Form validation
        $request->validate([
            'language_id' => 'required|integer',
            'site_name' => 'required',
            'site_desc' => 'required',
            'site_keywords' => 'required',
            'please_create_a_category' => 'required',
            'languages' => 'required',
            'add_language' => 'required',
            'edit_language' => 'required',
            'language_name' => 'required',
            'language_code' => 'required',
            'direction' => 'required',
            'keywords' => 'required',
            'for_admin_panel' => 'required',
            'for_frontend' => 'required',
            'content_group' => 'required',
            'menu' => 'required',
            'hide' => 'required',
            'show' => 'required',
            'yes' => 'required',
            'no' => 'required',
            'display_footer_menu' => 'required',
            'display_dropdown' => 'required',
            'default_site_language' => 'required',
            'please_try_again' => 'required',
            'you_are_not_authorized' => 'required',
            'comment' => 'required',
            'comments' => 'required',
            'approval_status' => 'required',
            'mark_all_as_approval' => 'required',
            'read' => 'required',
            'unread' => 'required',
            'profile' => 'required',
            'change_password' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        $content_five_group_keyword = ContentFiveGroupKeyword::where('language_id', $id)->first();

        // Update to database
        ContentFiveGroupKeyword::find($content_five_group_keyword->id)->update($input);

        return redirect()->route('language-keyword-for-adminpanel.create', $input['language_id'])
            ->with('success', 'content.updated_successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_content_six_group_keyword(Request $request)
    {
        // Form validation
        $request->validate([
            'language_id' => 'required|unique:content_six_group_keywords',
            'current_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required',
            'add_faq' => 'required',
            'edit_faq' => 'required',
            'favicon_image' => 'required',
            'admin_logo_image' => 'required',
            'pending_approval' => 'required',
            'approval' => 'required',
            'which_language' => 'required',
            'reminding' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        ContentSixGroupKeyword::firstOrCreate([
            'language_id' => $input['language_id'],
            'current_password' => $input['current_password'],
            'new_password' => $input['new_password'],
            'confirm_password' => $input['confirm_password'],
            'add_faq' => $input['add_faq'],
            'edit_faq' => $input['edit_faq'],
            'favicon_image' => $input['favicon_image'],
            'admin_logo_image' => $input['admin_logo_image'],
            'pending_approval' => $input['pending_approval'],
            'approval' => $input['approval'],
            'which_language' => $input['which_language'],
            'reminding' => $input['reminding'],
        ]);

        return redirect()->route('language-keyword-for-adminpanel.create', $input['language_id'])
            ->with('success', 'content.created_successfully');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_content_six_group_keyword(Request $request, $id)
    {
        // Form validation
        $request->validate([
            'language_id' => 'required|integer',
            'current_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required',
            'add_faq' => 'required',
            'edit_faq' => 'required',
            'favicon_image' => 'required',
            'admin_logo_image' => 'required',
            'pending_approval' => 'required',
            'approval' => 'required',
            'which_language' => 'required',
            'reminding' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        $content_six_group_keyword = ContentSixGroupKeyword::where('language_id', $id)->first();

        // Update to database
        ContentSixGroupKeyword::find($content_six_group_keyword->id)->update($input);

        return redirect()->route('language-keyword-for-adminpanel.create', $input['language_id'])
            ->with('success', 'content.updated_successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_frontend_one_group_keyword(Request $request)
    {
        // Form validation
        $request->validate([
            'language_id' => 'required|unique:frontend_one_group_keywords',
            'home' => 'required',
            'about' => 'required',
            'services' => 'required',
            'teams' => 'required',
            'projects' => 'required',
            'news' => 'required',
            'pricing' => 'required',
            'faqs' => 'required',
            'skills' => 'required',
            'contact' => 'required',
            'gallery' => 'required',
            'galleries' => 'required',
            'office_address' => 'required',
            'social_list' => 'required',
            'read_more' => 'required',
            'call_us_now' => 'required',
            'more_question' => 'required',
            'testimonials' => 'required',
            'all_news' => 'required',
            'your_message_has_been_delivered' => 'required',
            'your_comment_is_pending_approval' => 'required',
            'help' => 'required',
            'contact_info' => 'required',
            'submit_now' => 'required',
            'updating' => 'required',
            'all' => 'required',
            'recent_posts' => 'required',
            'by' => 'required',
            'pages' => 'required',
            'per_monthly' => 'required',
            'per_annual' => 'required',
            'comments' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        FrontendOneGroupKeyword::firstOrCreate([
            'language_id' => $input['language_id'],
            'home' => $input['home'],
            'about' => $input['about'],
            'services' => $input['services'],
            'teams' => $input['teams'],
            'projects' => $input['projects'],
            'news' => $input['news'],
            'pricing' => $input['pricing'],
            'faqs' => $input['faqs'],
            'skills' => $input['skills'],
            'contact' => $input['contact'],
            'gallery' => $input['gallery'],
            'galleries' => $input['galleries'],
            'office_address' => $input['office_address'],
            'social_list' => $input['social_list'],
            'read_more' => $input['read_more'],
            'call_us_now' => $input['call_us_now'],
            'more_question' => $input['more_question'],
            'testimonials' => $input['testimonials'],
            'all_news' => $input['all_news'],
            'your_message_has_been_delivered' => $input['your_message_has_been_delivered'],
            'your_comment_is_pending_approval' => $input['your_comment_is_pending_approval'],
            'help' => $input['help'],
            'contact_info' => $input['contact_info'],
            'submit_now' => $input['submit_now'],
            'updating' => $input['updating'],
            'all' => $input['all'],
            'recent_posts' => $input['recent_posts'],
            'by' => $input['by'],
            'pages' => $input['pages'],
            'per_monthly' => $input['per_monthly'],
            'per_annual' => $input['per_annual'],
            'comments' => $input['comments'],
        ]);

        return redirect()->route('language-keyword-for-frontend.frontend_create', $input['language_id'])
            ->with('success', 'content.created_successfully');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_frontend_one_group_keyword(Request $request, $id)
    {
        // Form validation
        $request->validate([
            'language_id' => 'required|integer',
            'home' => 'required',
            'about' => 'required',
            'services' => 'required',
            'teams' => 'required',
            'projects' => 'required',
            'news' => 'required',
            'pricing' => 'required',
            'faqs' => 'required',
            'skills' => 'required',
            'contact' => 'required',
            'gallery' => 'required',
            'galleries' => 'required',
            'office_address' => 'required',
            'social_list' => 'required',
            'read_more' => 'required',
            'call_us_now' => 'required',
            'more_question' => 'required',
            'testimonials' => 'required',
            'all_news' => 'required',
            'your_message_has_been_delivered' => 'required',
            'your_comment_is_pending_approval' => 'required',
            'help' => 'required',
            'contact_info' => 'required',
            'submit_now' => 'required',
            'updating' => 'required',
            'all' => 'required',
            'recent_posts' => 'required',
            'by' => 'required',
            'pages' => 'required',
            'per_monthly' => 'required',
            'per_annual' => 'required',
            'comments' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        $frontend_one_group_keyword = FrontendOneGroupKeyword::where('language_id', $id)->first();

        // Update to database
        FrontendOneGroupKeyword::find($frontend_one_group_keyword->id)->update($input);

        return redirect()->route('language-keyword-for-frontend.frontend_create', $input['language_id'])
            ->with('success', 'content.updated_successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_frontend_two_group_keyword(Request $request)
    {
        // Form validation
        $request->validate([
            'language_id' => 'required|unique:frontend_two_group_keywords',
            'leave_a_comment' => 'required',
            'your_name' => 'required',
            'your_email' => 'required',
            'your_comment' => 'required',
            'post_comment' => 'required',
            'search' => 'required',
            'search_results' => 'required',
            'search_here' => 'required',
            'nothing_found' => 'required',
            'categories' => 'required',
            'links' => 'required',
            'contact_us' => 'required',
            'view_more' => 'required',
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
            'tags' => 'required',
            'admin' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        FrontendTwoGroupKeyword::firstOrCreate([
            'language_id' => $input['language_id'],
            'leave_a_comment' => $input['leave_a_comment'],
            'your_name' => $input['your_name'],
            'your_email' => $input['your_email'],
            'your_comment' => $input['your_comment'],
            'post_comment' => $input['post_comment'],
            'search' => $input['search'],
            'search_results' => $input['search_results'],
            'search_here' => $input['search_here'],
            'nothing_found' => $input['nothing_found'],
            'categories' => $input['categories'],
            'links' => $input['links'],
            'contact_us' => $input['contact_us'],
            'view_more' => $input['view_more'],
            'name' => $input['name'],
            'email' => $input['email'],
            'subject' => $input['subject'],
            'message' => $input['message'],
            'tags' => $input['tags'],
            'admin' => $input['admin'],
        ]);

        return redirect()->route('language-keyword-for-frontend.frontend_create', $input['language_id'])
            ->with('success', 'content.created_successfully');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_frontend_two_group_keyword(Request $request, $id)
    {
        // Form validation
        $request->validate([
            'language_id' => 'required|integer',
            'leave_a_comment' => 'required',
            'your_name' => 'required',
            'your_email' => 'required',
            'your_comment' => 'required',
            'post_comment' => 'required',
            'search' => 'required',
            'search_results' => 'required',
            'search_here' => 'required',
            'nothing_found' => 'required',
            'categories' => 'required',
            'links' => 'required',
            'contact_us' => 'required',
            'view_more' => 'required',
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
            'tags' => 'required',
            'admin' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        $frontend_two_group_keyword = FrontendTwoGroupKeyword::where('language_id', $id)->first();

        // Update to database
        FrontendTwoGroupKeyword::find($frontend_two_group_keyword->id)->update($input);

        return redirect()->route('language-keyword-for-frontend.frontend_create', $input['language_id'])
            ->with('success', 'content.updated_successfully');
    }

}
