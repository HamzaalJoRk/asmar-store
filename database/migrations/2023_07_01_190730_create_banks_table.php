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
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->string('title',350);
            $table->decimal('minimum_payment', 15)->default(0.00)->comment(' minimum payment ');
            $table->decimal('limit_payment', 15)->default(0.00)->comment(' limit payment');
            $table->decimal('fee_percentage', 15)->default(0.00)->comment(' fee percentage ');
            $table->string('address',350);
            $table->boolean('is_active')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banks');
    }
};
