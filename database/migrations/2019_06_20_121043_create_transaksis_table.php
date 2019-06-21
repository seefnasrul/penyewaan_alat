<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('alat_id');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_rencana_kembali');
            $table->integer('lama_hari');
            $table->date('tanggal_kembali')->nullable();
            $table->integer('total_biaya_sewa');
            $table->integer('total_denda')->nullable();
            $table->string('nama_peminjam');
            $table->string('no_ktp_sim');
            $table->enum('tipe_identitas',['SIM','KTP']);
            $table->string('scan_identitas');
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
        Schema::dropIfExists('transaksis');
    }
}
