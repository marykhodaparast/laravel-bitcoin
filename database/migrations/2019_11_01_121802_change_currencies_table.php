<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('currencies', function (Blueprint $table) {
            $table->renameColumn('data_quote_star', 'data_quote_start');
            $table->string('type_is_crypto')->change();
            $table->string('data_symbols_count')->change();
            $table->string('volume_1hrs_usd')->change();
            $table->string('volume_1day_usd')->change();
            $table->string('volume_1mth_usd')->change();
            $table->string('data_start')->change();
            $table->string('data_end')->change();
            $table->string('price_usd')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('currencies', function (Blueprint $table) {
            $table->renameColumn('data_quote_start', 'data_quote_star');
            $table->integer('type_is_crypto')->change();
            $table->integer('data_symbols_count')->change();
            $table->float('volume_1hrs_usd')->change();
            $table->float('volume_1day_usd')->change();
            $table->float('volume_1mth_usd')->change();
            $table->datetime('data_start')->change();
            $table->datetime('data_end')->change();
            $table->string('price_usd')->change();
        });
    }
}
