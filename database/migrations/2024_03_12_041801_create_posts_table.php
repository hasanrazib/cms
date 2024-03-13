<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('post_title')->nullable();
            $table->text('post_excerpt')->nullable();
            $table->longText('post_content')->nullable();
            $table->tinyInteger('post_status')->nullable()->comment('1 = publish, 0 = unpublish');
            $table->string('page_banner')->nullable();
            $table->string('page_title')->nullable();
            $table->string('banner_text')->nullable();
            $table->string('post_slug')->nullable();
            $table->integer('post_order_by')->nullable();
            $table->unsignedBigInteger('post_author')->nullable()->index();
            $table->dateTime('post_date_gmt')->nullable();
            $table->string('comment_status', 20)->default('open');
            $table->string('ping_status', 20)->default('open');
            $table->string('post_password', 20)->nullable();
            $table->string('post_name', 200)->index()->nullable();
            $table->text('to_ping')->nullable();
            $table->text('pinged')->nullable();
            $table->dateTime('post_modified')->nullable();
            $table->dateTime('post_modified_gmt')->nullable();
            $table->longText('post_content_filtered')->nullable();
            $table->unsignedBigInteger('post_parent')->nullable()->index();
            $table->string('guid', 255)->nullable();
            $table->integer('menu_order')->default(0);
            $table->string('post_type', 20)->index()->default('post');
            $table->string('post_mime_type', 100)->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
