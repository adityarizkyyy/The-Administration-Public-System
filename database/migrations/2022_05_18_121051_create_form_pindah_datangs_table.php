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
        Schema::create('form_pindah_datang', function (Blueprint $table) {
            $table->id();
            $table->text('filektp');
            $table->text('filekk');
            $table->text('fileskp');
            $table->text('fileformpenjamin');
            $table->text('filektppenjamin');
            $table->text('filekkpenjamin');
            $table->text('filedraftkk');
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
        Schema::dropIfExists('form_pindah_datang');
    }
};
