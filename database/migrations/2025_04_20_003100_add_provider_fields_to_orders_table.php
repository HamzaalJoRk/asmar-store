<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->foreignId('provider_id')->nullable();
            $table->string('provider_order_id')->nullable();
            $table->json('provider_response')->nullable()->comment('Response from provider API');
            $table->timestamp('provider_processed_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['provider_id']);
            $table->dropColumn(['provider_id', 'provider_order_id', 'provider_response', 'provider_processed_at']);
        });
    }
};