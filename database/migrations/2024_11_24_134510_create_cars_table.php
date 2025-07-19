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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('brand_id')->unsigned()->index()->nullable();
            $table->foreign('brand_id')->references('id')->on('brands');//->onDelete('cascade');
            $table->bigInteger('model_id')->unsigned()->index()->nullable();
            $table->foreign('model_id')->references('id')->on('models');
            $table->string('title',90)->nullable();
            $table->string('image',190)->nullable();
            $table->enum('status',['Active','Inactive'])->default('Active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
