<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentFiveGroupKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_five_group_keywords', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->string('site_name');
            $table->string('site_desc');
            $table->string('site_keywords');
            $table->string('please_create_a_category');
            $table->string('languages');
            $table->string('add_language');
            $table->string('edit_language');
            $table->string('language_name');
            $table->string('language_code');
            $table->string('direction');
            $table->string('keywords');
            $table->string('for_admin_panel');
            $table->string('for_frontend');
            $table->string('content_group');
            $table->string('menu');
            $table->string('hide');
            $table->string('show');
            $table->string('yes');
            $table->string('no');
            $table->string('display_footer_menu');
            $table->string('display_dropdown');
            $table->string('default_site_language');
            $table->string('please_try_again');
            $table->string('you_are_not_authorized');
            $table->string('comment');
            $table->string('comments');
            $table->string('approval_status');
            $table->string('mark_all_as_approval');
            $table->string('read');
            $table->string('unread');
            $table->string('profile');
            $table->string('change_password');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('content_five_group_keywords');
    }
}
