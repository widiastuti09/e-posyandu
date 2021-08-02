<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLansiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lansias', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_register');
            $table->date('tanggal_lahir');
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->integer('rt');
            $table->integer('rw');
            $table->string('alamat');
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
        Schema::dropIfExists('lansias');
    }
}
