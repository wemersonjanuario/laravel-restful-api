<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->bigIncrements('post_id');
            $table->string('post_title');
            $table->text('post_body')->nullable();
            $table->integer('post_user_id')->nullable();
            $table->timestamp('post_created_at');
            $table->timestamp('post_updated_at');
        });

        Schema::create('comment', function (Blueprint $table) {
            $table->bigIncrements('comment_id');
            $table->integer('comment_post_id')->nullable();
            $table->integer('comment_user_id')->nullable();
            $table->text('comment_text');
            $table->timestamp('comment_created_at');
            $table->timestamp('comment_updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('post');
        Schema::drop('comment');
    }
}
