<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('_wp_posts', function (Blueprint $table) {
            $table->id();
            $table->string('post_id')->nullable();
            $table->date('modified_date')->nullable();
            $table->string('slug')->nullable();
            $table->string('status')->nullable();
            $table->string('type')->nullable();
            $table->string('link')->nullable();
            $table->string('title')->nullable();
            $table->LongText('content')->nullable();
            $table->LongText('excerpt')->nullable();
            $table->string('featured_image_full')->nullable();
            $table->string('featured_image_thumbnail')->nullable();
            $table->string('featured_image_medium')->nullable();
            $table->string('featured_image_medium_large')->nullable();
            $table->string('author_name')->nullable();
            $table->string('author_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_wp_posts');
    }
};
