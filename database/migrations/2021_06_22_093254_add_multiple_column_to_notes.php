<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMultipleColumnToNotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('enqueries', function (Blueprint $table) {
            $table->string('full_name');
            $table->string('email');
            $table->text('message');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('enqueries', function (Blueprint $table) {
            $table->dropColumn(['full_name',  'email', 'message']);
        });
    }
}
