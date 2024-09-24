<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateVisusColumnsInUkuransTable extends Migration
{
    public function up()
    {
        Schema::table('ukurans', function (Blueprint $table) {
            $table->string('right_visus', 50)->change();
            $table->string('left_visus', 50)->change();
        });
    }

    public function down()
    {
        Schema::table('ukurans', function (Blueprint $table) {
            $table->string('right_visus')->change();
            $table->string('left_visus')->change();
        });
    }
}