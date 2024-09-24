<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('ukurans', function (Blueprint $table) {
            $table->string('keseimbangan_binokuler')->nullable()->after('left_visus');
            $table->string('titikakhir_binokuler')->nullable()->after('keseimbangan_binokuler');
            $table->text('diagnosa')->nullable()->after('titikakhir_binokuler');
        });
    }

    public function down()
    {
        Schema::table('ukurans', function (Blueprint $table) {
            $table->dropColumn(['keseimbangan_binokuler', 'titikakhir_binokuler', 'diagnosa']);
        });
    }
};