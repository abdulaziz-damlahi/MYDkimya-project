<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentTwoGroupKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_two_group_keywords', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->string('section_title_and_desc');
            $table->string('top_title');
            $table->string('blogs');
            $table->string('add_blog');
            $table->string('edit_blog');
            $table->string('short_desc');
            $table->string('tag');
            $table->string('seperate_with_commas');
            $table->string('author');
            $table->string('category');
            $table->string('post_date');
            $table->string('view');
            $table->string('features');
            $table->string('add_feature');
            $table->string('edit_feature');
            $table->string('about');
            $table->string('counters');
            $table->string('add_counter');
            $table->string('edit_counter');
            $table->string('icon');
            $table->string('timer');
            $table->string('services');
            $table->string('add_service');
            $table->string('edit_service');
            $table->string('teams');
            $table->string('add_team');
            $table->string('edit_team');
            $table->string('name');
            $table->string('job');
            $table->string('skills');
            $table->string('add_skill');
            $table->string('edit_skill');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('content_two_group_keywords');
    }
}
