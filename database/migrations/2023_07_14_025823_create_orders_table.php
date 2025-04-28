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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('game_id')->nullable();
            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
            $table->unsignedBigInteger('package_id')->nullable();

            $table->string('invoice_no',50)->nullable();
            // $table->string('code',150)->nullable();
            $table->string('player_id',150)->nullable();
            $table->string('player_name',150)->nullable();
            $table->enum('status',['pending', 'approved','canceled'])->default('pending');
            $table->integer('qty')->comment('qty');
            $table->integer('qty_item')->comment('qty item (package Or Game');
            $table->decimal('price_item', 15, 2)->default(0.00)->comment('amount ');
            $table->decimal('final_total', 15, 2)->default(0.00)->comment('amount ');
            $table->text('details')->nullable();
            $table->text('reason')->nullable();

            $table->enum('canceled_type',['Admin','User'])->nullable();
            $table->unsignedBigInteger('canceled_by')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
