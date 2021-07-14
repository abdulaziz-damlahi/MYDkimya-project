<?php

namespace Database\Seeders;

use App\Models\Admin\MenuKeyword;
use Illuminate\Database\Seeder;

class MenuKeywordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create datas
        MenuKeyword::create([
            'language_id' => 1,
            'dashboard' => 'Dashboard',
            'banner' => 'Banner',
            'sliders' => 'Sliders',
            'categories' => 'Categories',
            'blogs' => 'Blogs',
            'features' => 'Features',
            'about' => 'About',
            'counters' => 'Counters',
            'services' => 'Services',
            'teams' => 'Teams',
            'skills' => 'Skills',
            'projects' => 'Projects',
            'sponsors' => 'Sponsors',
            'prices' => 'Prices',
            'faqs' => 'Faqs',
            'testimonials' => 'Testimonials',
            'contact' => 'Contact',
            'contact_info' => 'Contact Info',
            'socials' => 'Socials',
            'messages' => 'Messages',
            'pages' => 'Pages',
            'settings' => 'Settings',
            'site_info' => 'Site Info',
            'site_images' => 'Site Images',
            'homepage_versions' => 'Homepage Versions',
            'google_analytic' => 'Google Analytic',
            'external_url' => 'External Url',
            'breadcrumb' => 'Breadcrumb',
            'sections' => 'Sections',
            'seo' => 'Seo',
            'languages' => 'Languages',
            'optimizer' => 'Optimizer',
            'logout' => 'Logout',
            'notifications' => 'Notifications',
            'profile' => 'Profile',
            'change_password' => 'Change Password',
            'data_language' => 'Data Language',
            'comments' => 'Comments',
            'galleries' => 'Galleries',
            'which_language' => 'Which language do you want to create the data?',
            'reminding' => 'Please note that all the entries you create will be based on your chosen language.',
        ]);
    }
}
