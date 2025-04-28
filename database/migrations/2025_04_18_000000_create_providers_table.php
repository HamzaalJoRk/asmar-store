<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique(); // Unique identifier for the provider
            $table->string('logo')->nullable(); // URL or path to the provider's logo
            $table->string('api_url');
            $table->string('api_key');
            $table->json('api_endpoints')->nullable(); // JSON field for API endpoints
            $table->integer('total_requests')->default(0); // Statistics: total requests sent to the provider
            $table->integer('successful_requests')->default(0); // Statistics: successful requests
            $table->integer('failed_requests')->default(0); // Statistics: failed requests
            $table->text('description')->nullable();
            $table->text('notes')->nullable(); // Additional notes about the provider
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('providers');
    }
};