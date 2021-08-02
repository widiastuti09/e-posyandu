<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemeriksaanIbuHamilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemeriksaan_ibu_hamils', function (Blueprint $table) {
            $table->id();
            $table->float('hemoglobin_atas');
            $table->float('hemoglobin_bawah');
            $table->date('hpht');
            $table->date('htp');
            $table->integer('tinggibadan');
            $table->float('beratbadan');
            $table->integer('hamilke');
            $table->integer('persalinanke');
            $table->integer('keguguranke');
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
        Schema::dropIfExists('pemeriksaan_ibu_hamils');
    }
}
