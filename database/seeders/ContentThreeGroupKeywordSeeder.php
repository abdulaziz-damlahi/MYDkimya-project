<?php

namespace Database\Seeders;

use App\Models\Admin\ContentThreeGroupKeyword;
use Illuminate\Database\Seeder;

class ContentThreeGroupKeywordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create datas
        ContentThreeGroupKeyword::create([
            'language_id' => 1,
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
        ]);
    }
}
