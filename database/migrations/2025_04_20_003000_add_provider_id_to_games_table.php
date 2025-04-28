<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('games', function (Blueprint $table) {
            $table->foreignId('provider_id')->nullable()->constrained('providers')->nullOnDelete();
            $table->json('provider_params')->nullable()->comment('Additional parameters required by the provider');
            $table->string('provider_game_id')->nullable()->comment('Game ID in provider system');
        });
    }

    public function down(): void
    {
        Schema::table('games', function (Blueprint $table) {
            $table->dropForeign(['provider_id']);
            $table->dropColumn(['provider_id', 'provider_params', 'provider_game_id']);
        });
    }
};