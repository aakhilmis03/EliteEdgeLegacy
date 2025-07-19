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
        Schema::create('blog_category', function (Blueprint $table) {
            $table->id();
            $table->string('slug',190)->unique();
            $table->string('title',190)->nullable();
            $table->enum('status',['Active','Inactive'])->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_category');
    }
};
