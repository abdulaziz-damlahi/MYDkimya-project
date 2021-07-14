<?php

namespace Database\Seeders;

use App\Models\Admin\ContentFourGroupKeyword;
use Illuminate\Database\Seeder;

class ContentFourGroupKeywordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create datas
        ContentFourGroupKeyword::create([
            'language_id' => 1,
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
        ]);
    }
}
