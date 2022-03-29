<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenggunaanBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penggunaan_barangs', function (Blueprint $table) {
            $table->id();
            $table->string("nama_barang");
            $table->datetime("waktu_pakai");
            $table->datetime("waktu_selesai_pakai")->nullable();
            $table->string("nama_pemakai");
            $table->enum('status', ["selesai", "belum_selesai"]);
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
        Schema::dropIfExists('penggunaan_barangs');
    }
}
