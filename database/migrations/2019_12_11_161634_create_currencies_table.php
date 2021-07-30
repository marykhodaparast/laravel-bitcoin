<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->Increments('id');
            $table->string('name',255);
            $table->string('symbol',255);
            $table->double('price');
            $table->double('volume_24h')->nullable();
            $table->double('percent_change_24h')->nullable();
            $table->double('percent_change_7d')->nullable();
            $table->double('market_cap')->nullable();
            $table->integer('priority')->default(5);
            $table->timestamps();
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
