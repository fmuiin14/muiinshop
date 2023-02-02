<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_alamat_user', function (Blueprint $table) {
            $table->id();
            $table->string('no_hp')->nullable();
            $table->string('nama_alamat')->nullable();
            $table->string('id_provinsi')->nullable();
            $table->string('id_kabupaten')->nullable();
            $table->string('id_kecamatan')->nullable();
            $table->string('id_kelurahan')->nullable();
            $table->string('flag_alamat')->nullable();
            $table->string('id_user')->nullable();
            $table->text('detail_alamat')->nullable();
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
        Schema::dropIfExists('detail_alamat_user');
    }
};
