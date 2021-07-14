<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentFourGroupKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_four_group_keywords', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->string('map_iframe');
            $table->text('map_iframe_desc_placeholder');
            $table->string('contact');
            $table->string('add_contact');
            $table->string('edit_contact');
            $table->string('socials');
            $table->string('add_social');
            $table->string('edit_social');
            $table->string('link');
            $table->string('email');
            $table->string('subject');
            $table->string('message');
            $table->string('read_status');
            $table->string('mark_all_as_read');
            $table->string('mark');
            $table->string('messages');
            $table->string('site_info');
            $table->string('copyright');
            $table->string('address');
            $table->string('address_map_link');
            $table->string('phone');
            $table->string('site_images');
            $table->string('favicon');
            $table->string('admin_logo');
            $table->string('admin_small_logo_image');
            $table->string('site_white_logo_image');
            $table->string('site_colored_logo_image');
            $table->string('google_analytic');
            $table->string('external_url');
            $table->string('breadcrumb');
            $table->string('sections');
            $table->string('seo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('content_four_group_keywords');
    }
}
