<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentThreeGroupKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_three_group_keywords', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->string('percent_rate');
            $table->string('projects');
            $table->string('add_project');
            $table->string('edit_project');
            $table->string('sponsors');
            $table->string('add_sponsor');
            $table->string('edit_sponsor');
            $table->string('prices');
            $table->string('add_price');
            $table->string('edit_price');
            $table->string('currency');
            $table->string('price');
            $table->string('time');
            $table->string('monthly');
            $table->string('annually');
            $table->string('please_take_with_features_semicolon');
            $table->string('faqs');
            $table->string('add_faqs');
            $table->string('edit_faqs');
            $table->string('question');
            $table->string('answer');
            $table->string('testimonials');
            $table->string('add_testimonial');
            $table->string('edit_testimonial');
            $table->string('shadow_text');
            $table->string('star');
            $table->string('galleries');
            $table->string('add_gallery');
            $table->string('edit_gallery');
            $table->string('pages');
            $table->string('add_page');
            $table->string('edit_page');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('content_three_group_keywords');
    }
}
