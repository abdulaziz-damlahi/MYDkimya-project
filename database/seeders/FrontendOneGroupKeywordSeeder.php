<?php

namespace Database\Seeders;

use App\Models\Admin\FrontendOneGroupKeyword;
use Illuminate\Database\Seeder;

class FrontendOneGroupKeywordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create datas
        FrontendOneGroupKeyword::create([
            'language_id' => 1,
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
            'gallery' => 'Gallery',
            'galleries' => 'Galleries',
            'office_address' => 'Office Address',
            'social_list' => 'Social List',
            'read_more' => 'Read More',
            'call_us_now' => 'Call Us Now',
            'more_question' => 'More Question?',
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
            'pages' => 'Pages',
            'per_monthly' => 'Per Monthly',
            'per_annual' => 'Per Annual',
            'comments' => 'Comments',
        ]);
    }
}
