<?php


use App\Models\Admin\FrontendOneGroupKeyword;
use App\Models\Admin\FrontendTwoGroupKeyword;
use App\Models\Admin\Language;
use Illuminate\Support\Facades\Schema;

$frontend_one_group_columns = Schema::getColumnListing('frontend_one_group_keywords');
$frontend_two_group_columns = Schema::getColumnListing('frontend_two_group_keywords');


if (session()->has('language_id_from_dropdown')) {

    $language_id_from_dropdown = session()->get('language_id_from_dropdown');

    $language_frontend_one_group_keyword = FrontendOneGroupKeyword::where('language_id', $language_id_from_dropdown)->first();
    $language_frontend_two_group_keyword = FrontendTwoGroupKeyword::where('language_id', $language_id_from_dropdown)->first();


} else {

    $language = Language::where('default_site_language', 1)->first();

    $language_frontend_one_group_keyword = FrontendOneGroupKeyword::where('language_id', $language->id)->first();
    $language_frontend_two_group_keyword = FrontendTwoGroupKeyword::where('language_id', $language->id)->first();

}


if (isset($language_frontend_one_group_keyword) && isset($language_frontend_two_group_keyword)) {

    return [

        /*
      |--------------------------------------------------------------------------
      | Pagination Language Lines
      |--------------------------------------------------------------------------
      |
      | The following language lines are used by the paginator library to build
      | the simple pagination links. You are free to change them to anything
      | you want to customize your views to better match your application.
      |
      */

        /* Frontend Group 1 */
        $frontend_one_group_columns[2] => $language_frontend_one_group_keyword->home,
        $frontend_one_group_columns[3] => $language_frontend_one_group_keyword->about,
        $frontend_one_group_columns[4] => $language_frontend_one_group_keyword->services,
        $frontend_one_group_columns[5] => $language_frontend_one_group_keyword->teams,
        $frontend_one_group_columns[6] => $language_frontend_one_group_keyword->projects,
        $frontend_one_group_columns[7] => $language_frontend_one_group_keyword->news,
        $frontend_one_group_columns[8] => $language_frontend_one_group_keyword->pricing,
        $frontend_one_group_columns[9] => $language_frontend_one_group_keyword->faqs,
        $frontend_one_group_columns[10] => $language_frontend_one_group_keyword->skills,
        $frontend_one_group_columns[11] => $language_frontend_one_group_keyword->contact,
        $frontend_one_group_columns[12] => $language_frontend_one_group_keyword->gallery,
        $frontend_one_group_columns[13] => $language_frontend_one_group_keyword->galleries,
        $frontend_one_group_columns[14] => $language_frontend_one_group_keyword->office_address,
        $frontend_one_group_columns[15] => $language_frontend_one_group_keyword->social_list,
        $frontend_one_group_columns[16] => $language_frontend_one_group_keyword->read_pages,
        $frontend_one_group_columns[17] => $language_frontend_one_group_keyword->call_us_now,
        $frontend_one_group_columns[18] => $language_frontend_one_group_keyword->pages_question,
        $frontend_one_group_columns[19] => $language_frontend_one_group_keyword->testimonials,
        $frontend_one_group_columns[20] => $language_frontend_one_group_keyword->all_news,
        $frontend_one_group_columns[21] => $language_frontend_one_group_keyword->your_message_has_been_delivered,
        $frontend_one_group_columns[22] => $language_frontend_one_group_keyword->your_comment_is_pending_approval,
        $frontend_one_group_columns[23] => $language_frontend_one_group_keyword->help,
        $frontend_one_group_columns[24] => $language_frontend_one_group_keyword->contact_info,
        $frontend_one_group_columns[25] => $language_frontend_one_group_keyword->submit_now,
        $frontend_one_group_columns[26] => $language_frontend_one_group_keyword->updating,
        $frontend_one_group_columns[27] => $language_frontend_one_group_keyword->all,
        $frontend_one_group_columns[28] => $language_frontend_one_group_keyword->recent_posts,
        $frontend_one_group_columns[29] => $language_frontend_one_group_keyword->by,
        $frontend_one_group_columns[30] => $language_frontend_one_group_keyword->pages,
        $frontend_one_group_columns[31] => $language_frontend_one_group_keyword->per_monthly,
        $frontend_one_group_columns[32] => $language_frontend_one_group_keyword->per_annual,
        $frontend_one_group_columns[33] => $language_frontend_one_group_keyword->comments,

        /* Frontend Group 2 */
        $frontend_two_group_columns[2] => $language_frontend_two_group_keyword->leave_a_comment,
        $frontend_two_group_columns[3] => $language_frontend_two_group_keyword->your_name,
        $frontend_two_group_columns[4] => $language_frontend_two_group_keyword->your_email,
        $frontend_two_group_columns[5] => $language_frontend_two_group_keyword->your_comment,
        $frontend_two_group_columns[6] => $language_frontend_two_group_keyword->post_comment,
        $frontend_two_group_columns[7] => $language_frontend_two_group_keyword->search,
        $frontend_two_group_columns[8] => $language_frontend_two_group_keyword->search_results,
        $frontend_two_group_columns[9] => $language_frontend_two_group_keyword->search_here,
        $frontend_two_group_columns[10] => $language_frontend_two_group_keyword->nothing_found,
        $frontend_two_group_columns[11] => $language_frontend_two_group_keyword->categories,
        $frontend_two_group_columns[12] => $language_frontend_two_group_keyword->links,
        $frontend_two_group_columns[13] => $language_frontend_two_group_keyword->contact_us,
        $frontend_two_group_columns[14] => $language_frontend_two_group_keyword->view_pages,
        $frontend_two_group_columns[15] => $language_frontend_two_group_keyword->name,
        $frontend_two_group_columns[16] => $language_frontend_two_group_keyword->email,
        $frontend_two_group_columns[17] => $language_frontend_two_group_keyword->subject,
        $frontend_two_group_columns[18] => $language_frontend_two_group_keyword->message,
        $frontend_two_group_columns[19] => $language_frontend_two_group_keyword->tags,
        $frontend_two_group_columns[20] => $language_frontend_two_group_keyword->admin,

    ];

}
else {

    return [

        /*
        |--------------------------------------------------------------------------
        | Pagination Language Lines
        |--------------------------------------------------------------------------
        |
        | The following language lines are used by the paginator library to build
        | the simple pagination links. You are free to change them to anything
        | you want to customize your views to better match your application.
        |
        */

        // Frontend One Group Keyword
        'home' => 'Home',
        'about' => 'About',
        'services' => 'Services',
        'teams' => 'Teams',
        'projects' => 'Projects',
        'news' => 'News',
        'pricing' => 'Pricing',
        'faqs' => 'Faqs',
        'skills' => 'Skills',
        'contact' => 'Contact',
        'gallery' => 'E-catalog',
        'galleries' => 'Galleries',
        'office_address' => 'Office Address',
        'social_list' => 'Social List',
        'read_pages' => 'Read pages',
        'call_us_now' => 'Call Us Now',
        'pages_question' => 'pages Question?',
        'testimonials' => 'Testimonials',
        'all_news' => 'ALL NEWS',
        'your_message_has_been_delivered' => 'Your message has been delivered.',
        'your_comment_is_pending_approval' => 'Your comment is pending approval.',
        'help' => 'Help',
        'contact_info' => 'Contact Info',
        'submit_now' => 'Submit Now',
        'updating' => 'Updating...',
        'all' => 'All',
        'recent_posts' => 'Recent Posts',
        'by' => 'by',
        'pages' => 'more',
        'per_monthly' => 'Per Monthly',
        'per_annual' => 'Per Annual',
        'comments' => 'Comments',

        // Frontend Two Group Keyword
        'leave_a_comment' => 'Leave A Comment',
        'your_name' => 'Your Name *',
        'your_email' => 'Your Email *',
        'your_comment' => 'Your Comment *',
        'post_comment' => 'Post Comment',
        'search' => 'Search',
        'search_results' => 'Search Results',
        'search_here' => 'Search Here',
        'nothing_found' => 'Nothing Found',
        'categories' => 'Categories',
        'links' => 'Links',
        'contact_us' => 'Contact Us',
        'view_pages' => 'View pages',
        'name' => 'Name *',
        'email' => 'Email *',
        'subject' => 'Subject *',
        'message' => 'Message *',
        'tags' => 'Tags',
        'admin' => 'Admin',

    ];

}

