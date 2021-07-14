<?php

namespace Database\Seeders;

use App\Models\Admin\ContentFiveGroupKeyword;
use Illuminate\Database\Seeder;

class ContentFiveGroupKeywordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create datas
        ContentFiveGroupKeyword::create([
            'language_id' => 1,
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
        ]);
    }
}
