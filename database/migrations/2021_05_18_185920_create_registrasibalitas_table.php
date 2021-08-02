<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrasibalitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrasibalitas', function (Blueprint $table) {
            $table->id();
            $table->string('namabalita',100);
            $table->string('tempatlahir');
            $table->date('tanggallahir');
            $table->string('jeniskelamin');
            $table->string('namaayah');
            $table->string('namaibu');
            $table->integer('rt');
            $table->integer('rw');
            $table->float('usia');
            $table->float('bblahir');
            $table->float('pblahir');
            $table->bigInteger('nokk');
            $table->bigInteger('nikbalita');
            $table->string('telp');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registrasibalitas');
    }
}
