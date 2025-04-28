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
        Schema::create('level_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('level_id')->unsigned();
            $table->string('locale',5)->index();
            $table->unique(['level_id', 'locale']);
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
            $table->string('title',250);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('level_translations');
    }
};
