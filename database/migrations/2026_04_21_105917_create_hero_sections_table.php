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
        Schema::create('hero_sections', function (Blueprint $table) {
    $table->id();
    $table->string('title')->nullable();
    $table->string('subtitle')->nullable();
    $table->text('description')->nullable();

    $table->string('phone')->nullable();

    $table->string('button_text')->nullable();
    $table->string('button_link')->nullable();

    $table->string('secondary_button_text')->nullable();
    $table->string('secondary_button_link')->nullable();

    $table->string('badge_text')->nullable();
    $table->string('experience_text')->nullable();
    $table->string('patients_text')->nullable();

    $table->string('image')->nullable();

    $table->boolean('is_active')->default(true);
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_sections');
    }
};
