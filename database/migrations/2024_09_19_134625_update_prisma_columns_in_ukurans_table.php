<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePrismaColumnsInUkuransTable extends Migration
{
    public function up()
    {
        Schema::table('ukurans', function (Blueprint $table) {
            $table->string('right_prisma', 50)->change();
            $table->string('left_prisma', 50)->change();
        });
    }

    public function down()
    {
        Schema::table('ukurans', function (Blueprint $table) {
            $table->string('right_prisma')->change();
            $table->string('left_prisma')->change();
        });
    }
}