<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipe');
            $table->string('no_reg')->nullable();
            $table->string('kapasitas')->nullable();
            $table->string('no_polisi')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('image')->nullable();
            $table->bigInteger('harga_sewa_perhari');
            $table->bigInteger('jenis_id');
            $table->bigInteger('created_by');
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
        Schema::dropIfExists('alats');
    }
}
