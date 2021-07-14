<?php

namespace Database\Seeders;

use App\Models\Admin\ContentTwoGroupKeyword;
use Illuminate\Database\Seeder;

class ContentTwoGroupKeywordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create datas
        ContentTwoGroupKeyword::create([
            'language_id' => 1,
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
        ]);
    }
}
