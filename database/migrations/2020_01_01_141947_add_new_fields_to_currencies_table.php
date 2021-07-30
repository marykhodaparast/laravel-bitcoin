<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewFieldsToCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('currencies', function (Blueprint $table) {
            $table->string('Algorithm')->nullable();
            $table->double('NetHashesPerSecond')->nullable();
            $table->double('BlockTime')->nullable();
            $table->double('BlockReward')->nullable();

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
            $table->dropColumn('Algorithm');
            $table->dropColumn('NetHashesPerSecond');
            $table->dropColumn('BlockTime');
            $table->dropColumn('BlockReward');
        });
    }
}
