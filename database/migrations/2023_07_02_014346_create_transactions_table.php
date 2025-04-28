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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('cascade');

            $table->string('invoice_no',50)->nullable();
            // $table->string('code',150)->nullable();
            $table->string('account_number',150)->nullable();
            $table->string('account_name',150)->nullable();
            $table->enum('status',['pending', 'approved','canceled'])->default('pending');
            $table->decimal('final_total', 15, 2)->default(0.00)->comment('amount ');
            $table->dateTime('date_at')->nullable();
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
        Schema::dropIfExists('transactions');
    }
};
