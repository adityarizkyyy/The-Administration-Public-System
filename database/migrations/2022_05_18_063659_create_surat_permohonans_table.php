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
        Schema::create('surat_permohonan', function (Blueprint $table) {
            $table->id();
            $table->foreignId("permohonan_id")->references("id")->on("permohonan")->onDelete("cascade")->onUpdate("cascade")->nullable(true);
            $table->string("nosp");
            $table->string("filesp");
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
        Schema::dropIfExists('surat_permohonan');
    }
};
