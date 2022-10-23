<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDpdcbillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dpdcbills', function (Blueprint $table) {
            $table->id();
     $table->integer('StationId')->nullable();
            $table->integer('month')->nullable();
            $table->integer('year')->nullable();
            $table->float('min')->default(0);
            $table->float('max')->default(0);
            $table->float('value')->default(0);
            $table->dateTime('time1')->nullable();
            $table->integer('unique_id')->nullable();
              
            $table->float('prev')->default(0);
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
        Schema::dropIfExists('dpdcbills');
    }
}
