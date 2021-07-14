<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_keywords', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->string('dashboard');
            $table->string('banner');
            $table->string('sliders');
            $table->string('categories');
            $table->string('blogs');
            $table->string('features');
            $table->string('about');
            $table->string('counters');
            $table->string('services');
            $table->string('teams');
            $table->string('skills');
            $table->string('projects');
            $table->string('sponsors');
            $table->string('prices');
            $table->string('faqs');
            $table->string('testimonials');
            $table->string('contact');
            $table->string('contact_info');
            $table->string('socials');
            $table->string('messages');
            $table->string('pages');
            $table->string('settings');
            $table->string('site_info');
            $table->string('site_images');
            $table->string('homepage_versions');
            $table->string('google_analytic');
            $table->string('external_url');
            $table->string('breadcrumb');
            $table->string('sections');
            $table->string('seo');
            $table->string('languages');
            $table->string('optimizer');
            $table->string('logout');
            $table->string('notifications');
            $table->string('profile');
            $table->string('change_password');
            $table->string('data_language');
            $table->string('comments');
            $table->string('galleries');
            $table->string('which_language');
            $table->string('reminding');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_keywords');
    }
}
