<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMultipleCollumnToToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->string('tour_name')->after('id');
            $table->text('tour_description')->after('tour_name');
            $table->integer('tour_price')->after('tour_description');
            $table->string('tour_photo_path', 2048)->nullable()->after('tour_price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->dropColumn(['tour_name','tour_description','tour_price','tour_photo_path']);
        });
    }
}
