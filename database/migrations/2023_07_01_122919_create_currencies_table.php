<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->increments('id');
            // $table->string('country', 100);
            $table->string('currency', 100);
            $table->string('code', 25)->nullable();
            $table->decimal('rate', 18,2)->nullable();
            $table->string('symbol', 25)->nullable();
            // $table->string('thousand_separator', 10);
            // $table->string('decimal_separator', 10);
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currencies');
    }
}
