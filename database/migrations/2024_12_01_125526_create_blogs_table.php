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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->int('category_id'); 
            $table->string('slug',250)->unique();
            $table->string('title',250)->nullable();
            $table->string('image',250)->nullable();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->string('display_in',250)->nullable(); //Latest, Top Story, Top Deals, Market Insights, Video Showcase, Featured Articles
            $table->enum('status',['Active','Inactive'])->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
