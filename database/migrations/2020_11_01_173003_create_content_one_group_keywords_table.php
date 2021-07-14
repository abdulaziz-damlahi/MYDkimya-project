<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentOneGroupKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_one_group_keywords', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->string('sliders');
            $table->string('add_slider');
            $table->string('edit_slider');
            $table->string('add_new');
            $table->string('title');
            $table->string('desc');
            $table->string('btn_name');
            $table->string('btn_link');
            $table->string('order');
            $table->string('image');
            $table->string('size');
            $table->text('recommended_size');
            $table->string('submit');
            $table->string('action');
            $table->string('created_successfully');
            $table->string('updated_successfully');
            $table->string('deleted_successfully');
            $table->string('current_image');
            $table->string('not_yet_created');
            $table->string('delete');
            $table->string('close');
            $table->string('you_wont_be_able_to_revert_this');
            $table->string('cancel');
            $table->string('yes_delete_it');
            $table->string('categories');
            $table->string('add_category');
            $table->string('edit_category');
            $table->string('category_name');
            $table->string('status');
            $table->string('select_your_option');
            $table->string('enable');
            $table->string('disable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('content_one_group_keywords');
    }
}
