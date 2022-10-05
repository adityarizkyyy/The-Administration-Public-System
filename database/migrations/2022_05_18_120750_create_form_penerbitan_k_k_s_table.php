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
        Schema::create('form_penerbitan_kk', function (Blueprint $table) {
            $table->id();
            $table->string('namakepalakeluarga');
            $table->text('filedraftkk');
            $table->text('filebukunikah')->nullable();
            $table->json('filektpanggota');
            $table->json('fileaktaanggota');
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
        Schema::dropIfExists('form_penerbitan_kk');
    }
};
