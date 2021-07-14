<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrontendTwoGroupKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frontend_two_group_keywords', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->string('leave_a_comment');
            $table->string('your_name');
            $table->string('your_email');
            $table->string('your_comment');
            $table->string('post_comment');
            $table->string('search');
            $table->string('search_results');
            $table->string('search_here');
            $table->string('nothing_found');
            $table->string('categories');
            $table->string('links');
            $table->string('contact_us');
            $table->string('view_more');
            $table->string('name');
            $table->string('email');
            $table->string('subject');
            $table->string('message');
            $table->string('tags');
            $table->string('admin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('frontend_two_group_keywords');
    }
}
