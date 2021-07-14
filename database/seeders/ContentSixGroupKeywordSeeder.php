<?php

namespace Database\Seeders;

use App\Models\Admin\ContentSixGroupKeyword;
use Illuminate\Database\Seeder;

class ContentSixGroupKeywordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create datas
        ContentSixGroupKeyword::create([
            'language_id' => 1,
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
        ]);
    }
}
