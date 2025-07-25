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
        Schema::create('metatags', function (Blueprint $table) {
            $table->id();
            $table->string('url',250)->unique();
            $table->string('title',250)->nullable();
            $table->string('keyword',250)->nullable();
            $table->string('description',250)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metatags');
    }
};
