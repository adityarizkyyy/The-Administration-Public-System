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
        Schema::create('form_usaha_mikro', function (Blueprint $table) {
            $table->id();
            $table->string('alamat');
            $table->string('jenispermohonan');
            $table->string('nonpwp');
            $table->string('nonib');
            $table->string('namausaha');
            $table->string('kegiatanusaha');
            $table->string('jumlahtenagakerja');
            $table->string('jenisrekomendasi');
            $table->string('nosuratrekomendasi')->nullable();
            $table->string('statuslokasiusaha');
            $table->string('statuskepemilikanusaha');
            $table->string('luaslokasi');
            $table->string('lamausaha');
            $table->string('alatutamausaha');
            $table->string('kelurahanusaha');
            $table->string('kecamatanusaha');
            $table->string('kotausaha');
            $table->integer('omsetsebelumcovid')->default(0);
            $table->integer('omsetsetelahcovid')->default(0);
            $table->string('mediapemasaran');
            $table->text('filepasfoto');
            $table->text('filektp');
            $table->text('filekk');
            $table->text('filefototempatusaha');
            $table->text('filesuratketpasarjaya')->nullable();
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
        Schema::dropIfExists('form_usaha_mikro');
    }
};
