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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('short_description')->nullable();  
            $table->text('description')->nullable();
            $table->text('featured_image')->nullable();
            $table->string('service_category_id')->nullable();
            $table->string('slug')->nullable();
            $table->string('page_banner')->nullable();
            $table->string('page_title')->nullable();
            $table->string('banner_text')->nullable();
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
        Schema::dropIfExists('services');
    }
};
