<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWorkingTimeToEcStoreLocators extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ec_store_locators', function (Blueprint $table) {
            //
            $table->string('working_time',255)->nullable();
            $table->string('google_map',255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ec_store_locators', function (Blueprint $table) {
            //
            $table->dropColumn('working_time');
            $table->dropColumn('google_map');
        });
    }
}
