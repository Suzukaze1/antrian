<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntrianLoketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antrian.antrian_lokets', function (Blueprint $table) {
            $table->increments('id');
            $table->string("id_loket", 2);
            $table->integer("no_urut");
            $table->string("no_pasien", 50)->nullable();
            $table->boolean("is_bpjs")->default(0);
            $table->boolean("panggil");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('antrian_lokets');
    }
}
