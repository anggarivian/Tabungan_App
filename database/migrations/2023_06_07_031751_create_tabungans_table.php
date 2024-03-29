<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabungansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabungans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kelas')->nullable();
            $table->string('id_tabungan', 10);
            $table->integer('saldo_awal')->default(0);
            $table->integer('saldo_akhir')->default(0);
            $table->string('tipe_transaksi')->nullable();
            $table->integer('jumlah')->default(0);
            $table->integer('premi')->default(0);
            $table->integer('sisa')->default(0);
            $table->foreignId('roles_id')->constrained();
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
        Schema::dropIfExists('tabungans');
    }
}
