<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('ukurans', function (Blueprint $table) {
            $table->after('ukuran_kacamata_lama', function ($table) {
                $table->string('righto_sph')->nullable();
                $table->string('righto_cyl')->nullable();
                $table->integer('righto_axis')->nullable();
                $table->string('lefto_sph')->nullable();
                $table->string('lefto_cyl')->nullable();
                $table->integer('lefto_axis')->nullable();
            });
        });
    }

    public function down()
    {
        Schema::table('ukurans', function (Blueprint $table) {
            $table->dropColumn([
                'righto_sph',
                'righto_cyl',
                'righto_axis',
                'lefto_sph',
                'lefto_cyl',
                'lefto_axis'
            ]);
        });
    }
};