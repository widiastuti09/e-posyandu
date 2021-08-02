<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnIdIbuToRegistrasibalitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registrasibalitas', function (Blueprint $table) {
            $table->bigInteger('id_ibu')->unsigned()->nullable()->after('namaibu');

            $table->foreign('id_ibu')->references('id')->on('ibuhamils')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('registrasibalitas', function (Blueprint $table) {
            //
        });
    }
}
