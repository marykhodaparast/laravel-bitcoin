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
            $table->string('asset_id',255);
            $table->integer('type_is_crypto');
            $table->timestamp('data_start')->default(DB::raw('CURRENT_TIMESTAMP'));;
            $table->timestamp('data_end')->default(DB::raw('CURRENT_TIMESTAMP'));;
            $table->string('data_quote_star');
            $table->string('data_quote_end');
            $table->string('data_orderbook_start');
            $table->string('data_orderbook_end');
            $table->string('data_trade_start');
            $table->string('data_trade_end');
            $table->integer('data_symbols_count');
            $table->float('volume_1hrs_usd');
            $table->float('volume_1day_usd');
            $table->float('volume_1mth_usd');
            $table->string('price_usd');
            $table->string('name',255);
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
