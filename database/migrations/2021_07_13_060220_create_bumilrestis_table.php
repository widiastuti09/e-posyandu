<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBumilrestisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bumilrestis', function (Blueprint $table) {
            $table->id();
            $table->integer('umur_hamil');
            $table->string('gpa');
            $table->string('asuransi');
            $table->string('resiko_tinggi');
            $table->date('hpl');
            $table->string('wali_bumil');
            $table->bigInteger('id_ibu')->unsigned();
            $table->timestamps();

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
        Schema::dropIfExists('bumilrestis');
    }
}
