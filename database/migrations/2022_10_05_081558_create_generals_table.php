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
        Schema::create('generals', function (Blueprint $table) {
            $table->id();
            $table->string('tahun_ajaran');
            $table->enum('semester', ['ganjil', 'genap']);
            $table->string('kaprodi')->nullable();
            $table->string('nrp_kaprodi')->nullable();
            $table->string('kalab')->nullable();
            $table->string('nrp_kalab')->nullable();
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
        Schema::dropIfExists('generals');
    }
};
