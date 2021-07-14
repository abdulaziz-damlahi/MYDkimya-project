<?php

namespace Database\Seeders;

use App\Models\Admin\FrontendTwoGroupKeyword;
use Illuminate\Database\Seeder;

class FrontendTwoGroupKeywordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create datas
        FrontendTwoGroupKeyword::create([
            'language_id' => 1,
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
            'view_more' => 'View More',
            'name' => 'Name *',
            'email' => 'Email *',
            'subject' => 'Subject *',
            'message' => 'Message *',
            'tags' => 'Tags',
            'admin' => 'Admin',
        ]);
    }
}
