<?php

namespace Database\Seeders;

use App\Models\Admin\ContentOneGroupKeyword;
use Illuminate\Database\Seeder;

class ContentOneGroupKeywordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create datas
        ContentOneGroupKeyword::create([
            'language_id' => 1,
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
        ]);
    }
}
