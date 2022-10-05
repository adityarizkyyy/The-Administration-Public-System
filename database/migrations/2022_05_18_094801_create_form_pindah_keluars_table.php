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
        Schema::create('form_pindah_keluar', function (Blueprint $table) {
            $table->id();
            $table->string('namakepalakeluarga');
            $table->string('alamatsekarang');
            $table->string('alamattujuan');
            $table->integer('jumlahanggotapindah')->default(0);
            $table->text('filektp');
            $table->text('filekk');
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
        Schema::dropIfExists('form_pindah_keluar');
    }
};
