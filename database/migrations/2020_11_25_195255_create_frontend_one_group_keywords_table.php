<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrontendOneGroupKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frontend_one_group_keywords', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->string('home');
            $table->string('about');
            $table->string('services');
            $table->string('teams');
            $table->string('projects');
            $table->string('news');
            $table->string('pricing');
            $table->string('faqs');
            $table->string('skills');
            $table->string('contact');
            $table->string('gallery');
            $table->string('galleries');
            $table->string('office_address');
            $table->string('social_list');
            $table->string('read_more');
            $table->string('call_us_now');
            $table->string('more_question');
            $table->string('testimonials');
            $table->string('all_news');
            $table->string('your_message_has_been_delivered');
            $table->string('your_comment_is_pending_approval');
            $table->string('help');
            $table->string('contact_info');
            $table->string('submit_now');
            $table->string('updating');
            $table->string('all');
            $table->string('recent_posts');
            $table->string('by');
            $table->string('pages');
            $table->string('per_monthly');
            $table->string('per_annual');
            $table->string('comments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('frontend_one_group_keywords');
    }
}
