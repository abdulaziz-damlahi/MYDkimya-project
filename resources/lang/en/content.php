<?php

use App\Models\Admin\ContentFiveGroupKeyword;
use App\Models\Admin\ContentFourGroupKeyword;
use App\Models\Admin\ContentOneGroupKeyword;
use App\Models\Admin\ContentSixGroupKeyword;
use App\Models\Admin\ContentThreeGroupKeyword;
use App\Models\Admin\ContentTwoGroupKeyword;
use App\Models\Admin\Language;
use Illuminate\Support\Facades\Schema;

$content_one_group_columns = Schema::getColumnListing('content_one_group_keywords');
$content_two_group_columns = Schema::getColumnListing('content_two_group_keywords');
$content_three_group_columns = Schema::getColumnListing('content_three_group_keywords');
$content_four_group_columns = Schema::getColumnListing('content_four_group_keywords');
$content_five_group_columns = Schema::getColumnListing('content_five_group_keywords');
$content_six_group_columns = Schema::getColumnListing('content_six_group_keywords');


if (session()->has('language_id_from_dropdown')) {

    $language_id_from_dropdown = session()->get('language_id_from_dropdown');

    $language_content_one_group_keyword = ContentOneGroupKeyword::where('language_id', $language_id_from_dropdown)->first();
    $language_content_two_group_keyword = ContentTwoGroupKeyword::where('language_id', $language_id_from_dropdown)->first();
    $language_content_three_group_keyword = ContentThreeGroupKeyword::where('language_id', $language_id_from_dropdown)->first();
    $language_content_four_group_keyword = ContentFourGroupKeyword::where('language_id', $language_id_from_dropdown)->first();
    $language_content_five_group_keyword = ContentFiveGroupKeyword::where('language_id', $language_id_from_dropdown)->first();
    $language_content_six_group_keyword = ContentSixGroupKeyword::where('language_id', $language_id_from_dropdown)->first();

} else {

    $language = Language::where('default_site_language', 1)->first();

    $language_content_one_group_keyword = ContentOneGroupKeyword::where('language_id', $language->id)->first();
    $language_content_two_group_keyword = ContentTwoGroupKeyword::where('language_id', $language->id)->first();
    $language_content_three_group_keyword = ContentThreeGroupKeyword::where('language_id', $language->id)->first();
    $language_content_four_group_keyword = ContentFourGroupKeyword::where('language_id', $language->id)->first();
    $language_content_five_group_keyword = ContentFiveGroupKeyword::where('language_id', $language->id)->first();
    $language_content_six_group_keyword = ContentSixGroupKeyword::where('language_id', $language->id)->first();

}

if (isset($language_content_one_group_keyword) && isset($language_content_two_group_keyword)  &&
   isset($language_content_three_group_keyword) && isset($language_content_four_group_keyword) &&
   isset($language_content_five_group_keyword) && isset($language_content_six_group_keyword)) {

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

        /* Content Group 1 */
        $content_one_group_columns[2] => $language_content_one_group_keyword->sliders,
        $content_one_group_columns[3] => $language_content_one_group_keyword->add_slider,
        $content_one_group_columns[4] => $language_content_one_group_keyword->edit_slider,
        $content_one_group_columns[5] => $language_content_one_group_keyword->add_new,
        $content_one_group_columns[6] => $language_content_one_group_keyword->title,
        $content_one_group_columns[7] => $language_content_one_group_keyword->desc,
        $content_one_group_columns[8] => $language_content_one_group_keyword->btn_name,
        $content_one_group_columns[9] => $language_content_one_group_keyword->btn_link,
        $content_one_group_columns[10] => $language_content_one_group_keyword->order,
        $content_one_group_columns[11] => $language_content_one_group_keyword->image,
        $content_one_group_columns[12] => $language_content_one_group_keyword->size,
        $content_one_group_columns[13] => $language_content_one_group_keyword->recommended_size,
        $content_one_group_columns[14] => $language_content_one_group_keyword->submit,
        $content_one_group_columns[15] => $language_content_one_group_keyword->action,
        $content_one_group_columns[16] => $language_content_one_group_keyword->created_successfully,
        $content_one_group_columns[17] => $language_content_one_group_keyword->updated_successfully,
        $content_one_group_columns[18] => $language_content_one_group_keyword->deleted_successfully,
        $content_one_group_columns[19] => $language_content_one_group_keyword->current_image,
        $content_one_group_columns[20] => $language_content_one_group_keyword->not_yet_created,
        $content_one_group_columns[21] => $language_content_one_group_keyword->delete,
        $content_one_group_columns[22] => $language_content_one_group_keyword->close,
        $content_one_group_columns[23] => $language_content_one_group_keyword->you_wont_be_able_to_revert_this,
        $content_one_group_columns[24] => $language_content_one_group_keyword->cancel,
        $content_one_group_columns[25] => $language_content_one_group_keyword->yes_delete_it,
        $content_one_group_columns[26] => $language_content_one_group_keyword->categories,
        $content_one_group_columns[27] => $language_content_one_group_keyword->add_category,
        $content_one_group_columns[28] => $language_content_one_group_keyword->edit_category,
        $content_one_group_columns[29] => $language_content_one_group_keyword->category_name,
        $content_one_group_columns[30] => $language_content_one_group_keyword->status,
        $content_one_group_columns[31] => $language_content_one_group_keyword->select_your_option,
        $content_one_group_columns[32] => $language_content_one_group_keyword->enable,
        $content_one_group_columns[33] => $language_content_one_group_keyword->disable,


        /* Content Group 2 */
        $content_two_group_columns[2] => $language_content_two_group_keyword->section_title_and_desc,
        $content_two_group_columns[3] => $language_content_two_group_keyword->top_title,
        $content_two_group_columns[4] => $language_content_two_group_keyword->blogs,
        $content_two_group_columns[5] => $language_content_two_group_keyword->add_blog,
        $content_two_group_columns[6] => $language_content_two_group_keyword->edit_blog,
        $content_two_group_columns[7] => $language_content_two_group_keyword->short_desc,
        $content_two_group_columns[8] => $language_content_two_group_keyword->tag,
        $content_two_group_columns[9] => $language_content_two_group_keyword->seperate_with_commas,
        $content_two_group_columns[10] => $language_content_two_group_keyword->author,
        $content_two_group_columns[11] => $language_content_two_group_keyword->category,
        $content_two_group_columns[12] => $language_content_two_group_keyword->post_date,
        $content_two_group_columns[13] => $language_content_two_group_keyword->view,
        $content_two_group_columns[14] => $language_content_two_group_keyword->features,
        $content_two_group_columns[15] => $language_content_two_group_keyword->add_feature,
        $content_two_group_columns[16] => $language_content_two_group_keyword->edit_feature,
        $content_two_group_columns[17] => $language_content_two_group_keyword->about,
        $content_two_group_columns[18] => $language_content_two_group_keyword->counters,
        $content_two_group_columns[19] => $language_content_two_group_keyword->add_counter,
        $content_two_group_columns[20] => $language_content_two_group_keyword->edit_counter,
        $content_two_group_columns[21] => $language_content_two_group_keyword->icon,
        $content_two_group_columns[22] => $language_content_two_group_keyword->timer,
        $content_two_group_columns[23] => $language_content_two_group_keyword->services,
        $content_two_group_columns[24] => $language_content_two_group_keyword->add_service,
        $content_two_group_columns[25] => $language_content_two_group_keyword->edit_service,
        $content_two_group_columns[26] => $language_content_two_group_keyword->teams,
        $content_two_group_columns[27] => $language_content_two_group_keyword->add_team,
        $content_two_group_columns[28] => $language_content_two_group_keyword->edit_team,
        $content_two_group_columns[29] => $language_content_two_group_keyword->name,
        $content_two_group_columns[30] => $language_content_two_group_keyword->job,
        $content_two_group_columns[31] => $language_content_two_group_keyword->skills,
        $content_two_group_columns[32] => $language_content_two_group_keyword->add_skill,
        $content_two_group_columns[33] => $language_content_two_group_keyword->edit_skill,

        /* Content Group 3 */
        $content_three_group_columns[2] => $language_content_three_group_keyword->percent_rate,
        $content_three_group_columns[3] => $language_content_three_group_keyword->projects,
        $content_three_group_columns[4] => $language_content_three_group_keyword->add_project,
        $content_three_group_columns[5] => $language_content_three_group_keyword->edit_project,
        $content_three_group_columns[6] => $language_content_three_group_keyword->sponsors,
        $content_three_group_columns[7] => $language_content_three_group_keyword->add_sponsor,
        $content_three_group_columns[8] => $language_content_three_group_keyword->edit_sponsor,
        $content_three_group_columns[9] => $language_content_three_group_keyword->prices,
        $content_three_group_columns[10] => $language_content_three_group_keyword->add_price,
        $content_three_group_columns[11] => $language_content_three_group_keyword->edit_price,
        $content_three_group_columns[12] => $language_content_three_group_keyword->currency,
        $content_three_group_columns[13] => $language_content_three_group_keyword->price,
        $content_three_group_columns[14] => $language_content_three_group_keyword->time,
        $content_three_group_columns[15] => $language_content_three_group_keyword->monthly,
        $content_three_group_columns[16] => $language_content_three_group_keyword->annually,
        $content_three_group_columns[17] => $language_content_three_group_keyword->please_take_with_features_semicolon,
        $content_three_group_columns[18] => $language_content_three_group_keyword->faqs,
        $content_three_group_columns[19] => $language_content_three_group_keyword->add_faqs,
        $content_three_group_columns[20] => $language_content_three_group_keyword->edit_faqs,
        $content_three_group_columns[21] => $language_content_three_group_keyword->question,
        $content_three_group_columns[22] => $language_content_three_group_keyword->answer,
        $content_three_group_columns[23] => $language_content_three_group_keyword->testimonials,
        $content_three_group_columns[24] => $language_content_three_group_keyword->add_testimonial,
        $content_three_group_columns[25] => $language_content_three_group_keyword->edit_testimonial,
        $content_three_group_columns[26] => $language_content_three_group_keyword->shadow_text,
        $content_three_group_columns[27] => $language_content_three_group_keyword->star,
        $content_three_group_columns[28] => $language_content_three_group_keyword->galleries,
        $content_three_group_columns[29] => $language_content_three_group_keyword->add_gallery,
        $content_three_group_columns[30] => $language_content_three_group_keyword->edit_gallery,
        $content_three_group_columns[31] => $language_content_three_group_keyword->pages,
        $content_three_group_columns[32] => $language_content_three_group_keyword->add_page,
        $content_three_group_columns[33] => $language_content_three_group_keyword->edit_page,

        /* Content Group 4 */
        $content_four_group_columns[2] => $language_content_four_group_keyword->map_iframe,
        $content_four_group_columns[3] => $language_content_four_group_keyword->map_iframe_desc_placeholder,
        $content_four_group_columns[4] => $language_content_four_group_keyword->contact,
        $content_four_group_columns[5] => $language_content_four_group_keyword->add_contact,
        $content_four_group_columns[6] => $language_content_four_group_keyword->edit_contact,
        $content_four_group_columns[7] => $language_content_four_group_keyword->socials,
        $content_four_group_columns[8] => $language_content_four_group_keyword->add_social,
        $content_four_group_columns[9] => $language_content_four_group_keyword->edit_social,
        $content_four_group_columns[10] => $language_content_four_group_keyword->link,
        $content_four_group_columns[11] => $language_content_four_group_keyword->email,
        $content_four_group_columns[12] => $language_content_four_group_keyword->subject,
        $content_four_group_columns[13] => $language_content_four_group_keyword->message,
        $content_four_group_columns[14] => $language_content_four_group_keyword->read_status,
        $content_four_group_columns[15] => $language_content_four_group_keyword->mark_all_as_read,
        $content_four_group_columns[16] => $language_content_four_group_keyword->mark,
        $content_four_group_columns[17] => $language_content_four_group_keyword->messages,
        $content_four_group_columns[18] => $language_content_four_group_keyword->site_info,
        $content_four_group_columns[19] => $language_content_four_group_keyword->copyright,
        $content_four_group_columns[20] => $language_content_four_group_keyword->address,
        $content_four_group_columns[21] => $language_content_four_group_keyword->address_map_link,
        $content_four_group_columns[22] => $language_content_four_group_keyword->phone,
        $content_four_group_columns[23] => $language_content_four_group_keyword->site_images,
        $content_four_group_columns[24] => $language_content_four_group_keyword->favicon,
        $content_four_group_columns[25] => $language_content_four_group_keyword->admin_logo,
        $content_four_group_columns[26] => $language_content_four_group_keyword->admin_small_logo_image,
        $content_four_group_columns[27] => $language_content_four_group_keyword->site_white_logo_image,
        $content_four_group_columns[28] => $language_content_four_group_keyword->site_colored_logo_image,
        $content_four_group_columns[29] => $language_content_four_group_keyword->google_analytic,
        $content_four_group_columns[30] => $language_content_four_group_keyword->external_url,
        $content_four_group_columns[31] => $language_content_four_group_keyword->breadcrumb,
        $content_four_group_columns[32] => $language_content_four_group_keyword->sections,
        $content_four_group_columns[33] => $language_content_four_group_keyword->seo,

        /* Content Group 5 */
        $content_five_group_columns[2] => $language_content_five_group_keyword->site_name,
        $content_five_group_columns[3] => $language_content_five_group_keyword->site_desc,
        $content_five_group_columns[4] => $language_content_five_group_keyword->site_keywords,
        $content_five_group_columns[5] => $language_content_five_group_keyword->please_create_a_category,
        $content_five_group_columns[6] => $language_content_five_group_keyword->languages,
        $content_five_group_columns[7] => $language_content_five_group_keyword->add_language,
        $content_five_group_columns[8] => $language_content_five_group_keyword->edit_language,
        $content_five_group_columns[9] => $language_content_five_group_keyword->language_name,
        $content_five_group_columns[10] => $language_content_five_group_keyword->language_code,
        $content_five_group_columns[11] => $language_content_five_group_keyword->direction,
        $content_five_group_columns[12] => $language_content_five_group_keyword->keywords,
        $content_five_group_columns[13] => $language_content_five_group_keyword->for_admin_panel,
        $content_five_group_columns[14] => $language_content_five_group_keyword->for_frontend,
        $content_five_group_columns[15] => $language_content_five_group_keyword->content_group,
        $content_five_group_columns[16] => $language_content_five_group_keyword->menu,
        $content_five_group_columns[17] => $language_content_five_group_keyword->hide,
        $content_five_group_columns[18] => $language_content_five_group_keyword->show,
        $content_five_group_columns[19] => $language_content_five_group_keyword->yes,
        $content_five_group_columns[20] => $language_content_five_group_keyword->no,
        $content_five_group_columns[21] => $language_content_five_group_keyword->display_footer_menu,
        $content_five_group_columns[22] => $language_content_five_group_keyword->display_dropdown,
        $content_five_group_columns[23] => $language_content_five_group_keyword->default_site_language,
        $content_five_group_columns[24] => $language_content_five_group_keyword->please_try_again,
        $content_five_group_columns[25] => $language_content_five_group_keyword->you_are_not_authorized,
        $content_five_group_columns[26] => $language_content_five_group_keyword->comment,
        $content_five_group_columns[27] => $language_content_five_group_keyword->comments,
        $content_five_group_columns[28] => $language_content_five_group_keyword->approval_status,
        $content_five_group_columns[29] => $language_content_five_group_keyword->mark_all_as_approval,
        $content_five_group_columns[30] => $language_content_five_group_keyword->read,
        $content_five_group_columns[31] => $language_content_five_group_keyword->unread,
        $content_five_group_columns[32] => $language_content_five_group_keyword->profile,
        $content_five_group_columns[33] => $language_content_five_group_keyword->change_password,


        /* Content Group 6 */
        $content_six_group_columns[2] => $language_content_six_group_keyword->current_password,
        $content_six_group_columns[3] => $language_content_six_group_keyword->new_password,
        $content_six_group_columns[4] => $language_content_six_group_keyword->confirm_password,
        $content_six_group_columns[5] => $language_content_six_group_keyword->add_faq,
        $content_six_group_columns[6] => $language_content_six_group_keyword->edit_faq,
        $content_six_group_columns[7] => $language_content_six_group_keyword->favicon_image,
        $content_six_group_columns[8] => $language_content_six_group_keyword->admin_logo_image,
        $content_six_group_columns[9] => $language_content_six_group_keyword->pending_approval,
        $content_six_group_columns[10] => $language_content_six_group_keyword->approval,
        $content_six_group_columns[11] => $language_content_six_group_keyword->which_language,
        $content_six_group_columns[12] => $language_content_six_group_keyword->reminding,

    ];

} else {

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

        /* Content Group 1 */
        'sliders' => 'Sliders',
        'add_slider' => 'Add Slider',
        'edit_slider' => 'Edit Slider',
        'add_new' => 'Add New',
        'title' => 'Title',
        'desc' => 'Description',
        'btn_name' => 'Button Name',
        'btn_link' => 'Button Link',
        'order' => 'Order',
        'image' => 'Image',
        'size' => 'size',
        'recommended_size' => 'You do not have to use the recommended sizes. However, please use the recommended sizes for your site design to look its best.',
        'submit' => 'Submit',
        'action' => 'Action',
        'created_successfully' => 'Created Successfully.',
        'updated_successfully' => 'Updated Successfully.',
        'deleted_successfully' => 'Deleted Successfully.',
        'current_image' => 'Current Image',
        'not_yet_created' => 'Not yet created.',
        'delete' => 'Delete',
        'close' => 'Close',
        'you_wont_be_able_to_revert_this' => 'You wont be able to revert this!',
        'cancel' => 'Cancel',
        'yes_delete_it' => 'Yes, delete it!',
        'categories' => 'Categories',
        'add_category' => 'Add Category',
        'edit_category' => 'Edit Category',
        'category_name' => 'Category Name',
        'status' => 'Status',
        'select_your_option' => 'Select Your Option',
        'enable' => 'Enable',
        'disable' => 'Disable',

        /* Content Group 2 */
        'section_title_and_desc' => 'Section Title/Description',
        'top_title' => 'Top Title',
        'blogs' => 'Blogs',
        'add_blog' => 'Add Blog',
        'edit_blog' => 'Edit Blog',
        'short_desc' => 'Short Description',
        'tag' => 'Tag',
        'seperate_with_commas' => 'Seperate with commas',
        'author' => 'Author',
        'category' => 'Category',
        'post_date' => 'Post Date',
        'view' => 'View',
        'features' => 'Features',
        'add_feature' => 'Add Feature',
        'edit_feature' => 'Edit Feature',
        'about' => 'About',
        'counters' => 'Counters',
        'add_counter' => 'Add Counter',
        'edit_counter' => 'Edit Counter',
        'icon' => 'Icon',
        'timer' => 'Timer',
        'services' => 'Services',
        'add_service' => 'Add Service',
        'edit_service' => 'Edit Service',
        'teams' => 'Teams',
        'add_team' => 'Add Team',
        'edit_team' => 'Edit Team',
        'name' => 'Name',
        'job' => 'Job',
        'skills' => 'Skills',
        'add_skill' => 'Add Skill',
        'edit_skill' => 'Edit Skill',

        /* Content Group 3 */
        'percent_rate' => 'Percent Rate',
        'projects' => 'Projects',
        'add_project' => 'Add Project',
        'edit_project' => 'Edit Project',
        'sponsors' => 'Sponsors',
        'add_sponsor' => 'Add Sponsor',
        'edit_sponsor' => 'Edit Sponsor',
        'prices' => 'Prices',
        'add_price' => 'Add Price',
        'edit_price' => 'Edit Price',
        'currency' => 'Currency',
        'price' => 'Price',
        'time' => 'Time',
        'monthly' => 'Monthly',
        'annually' => 'Annually',
        'please_take_with_features_semicolon' => 'Please take with features semicolon(;).',
        'faqs' => 'Faqs',
        'add_faqs' => 'Add Faqs',
        'edit_faqs' => 'Edit Faqs',
        'question' => 'Question',
        'answer' => 'Answer',
        'testimonials' => 'Testimonials',
        'add_testimonial' => 'Add Testimonial',
        'edit_testimonial' => 'Edit Testimonial',
        'shadow_text' => 'Shadow Text',
        'star' => 'Star',
        'galleries' => 'Galleries',
        'add_gallery' => 'Add Gallery',
        'edit_gallery' => 'Edit Gallery',
        'pages' => 'Pages',
        'add_page' => 'Add Page',
        'edit_page' => 'Edit Page',

        /* Content Group 4 */
        'map_iframe' => 'Map Iframe (link in src)',
        'map_iframe_desc_placeholder' => 'Please find your address on Google Map. And click the Share Button on the Left Side. You will see the Map Placement Area. In the Copy Html field in this section Copy and paste the link in the src from the code inside.',
        'contact' => 'Contact',
        'add_contact' => 'Add Contact',
        'edit_contact' => 'Edit Contact',
        'socials' => 'Socials',
        'add_social' => 'Add Social',
        'edit_social' => 'Edit Social',
        'link' => 'Link',
        'email' => 'Email',
        'subject' => 'Subject',
        'message' => 'Message',
        'read_status' => 'Read Status',
        'mark_all_as_read' => 'Mark All As Read',
        'mark' => 'Mark',
        'messages' => 'Messages',
        'site_info' => 'Site Info',
        'copyright' => 'Copyright',
        'address' => 'Address',
        'address_map_link' => 'Address Map Link',
        'phone' => 'Phone',
        'site_images' => 'Site Images',
        'favicon' => 'Favicon',
        'admin_logo' => 'Admin Logo',
        'admin_small_logo_image' => 'Admin Small Logo',
        'site_white_logo_image' => 'Site White Logo',
        'site_colored_logo_image' => 'Site Colored Logo',
        'google_analytic' => 'Google Analytic',
        'external_url' => 'External Url',
        'breadcrumb' => 'Breadcrumb',
        'sections' => 'Sections',
        'seo' => 'Seo',

        /* Content Group 5 */
        'site_name' => 'Site Name',
        'site_desc' => 'Site Description',
        'site_keywords' => 'Site Keywords',
        'please_create_a_category' => 'Please create a category.',
        'languages' => 'Languages',
        'add_language' => 'Add Language',
        'edit_language' => 'Edit Language',
        'language_name' => 'Language Name',
        'language_code' => 'Language Code',
        'direction' => 'Direction',
        'keywords' => 'Keywords',
        'for_admin_panel' => 'For Admin Panel',
        'for_frontend' => 'For Frontend',
        'content_group' => 'Content Group',
        'menu' => 'Menu',
        'hide' => 'Hide',
        'show' => 'Show',
        'yes' => 'Yes',
        'no' => 'No',
        'display_footer_menu' => 'Display Footer Menu?',
        'display_dropdown' => 'Display Dropdown?',
        'default_site_language' => 'Default Site Language',
        'please_try_again' => 'Please try again!',
        'you_are_not_authorized' => 'You are not authorized to delete this operation.',
        'comment' => 'Comment',
        'comments' => 'Comments',
        'approval_status' => 'Approval Status',
        'mark_all_as_approval' => 'Mark All As Approval',
        'read' => 'Read',
        'unread' => 'Unread',
        'profile' => 'Profile',
        'change_password' => 'Change Password',

        /* Content Group 6 */
        'current_password' => 'Current Password',
        'new_password' => 'New Password',
        'confirm_password' => 'Confirm Password',
        'add_faq' => 'Add Faq',
        'edit_faq' => 'Edit Faq',
        'favicon_image' => 'Favicon',
        'admin_logo_image' => 'Admin Logo Image',
        'pending_approval' => 'Pending Approval',
        'approval' => 'Approval',
        'which_language' => 'Which language do you want to create the data?',
        'reminding' => 'Please note that all the entries you create will be based on your chosen language.',

    ];

}



