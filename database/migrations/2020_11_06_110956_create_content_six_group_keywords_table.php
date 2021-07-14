<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentSixGroupKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_six_group_keywords', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->string('current_password');
            $table->string('new_password');
            $table->string('confirm_password');
            $table->string('add_faq');
            $table->string('edit_faq');
            $table->string('favicon_image');
            $table->string('admin_logo_image');
            $table->string('pending_approval');
            $table->string('approval');
            $table->string('which_language');
            $table->string('reminding');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('content_six_group_keywords');
    }
}
