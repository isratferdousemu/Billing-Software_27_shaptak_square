<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDGSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('d_g_s', function (Blueprint $table) {
            $table->id();
  $table->integer('StationId')->nullable();
            $table->integer('month')->nullable();
            $table->integer('year')->nullable();
            $table->float('min')->default(0);
            $table->float('max')->default(0);
            $table->float('value')->default(0);
            $table->dateTime('time1')->nullable();
            $table->integer('unique_id')->nullable();            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('d_g_s');
    }
}
