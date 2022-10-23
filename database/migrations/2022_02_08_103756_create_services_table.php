<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
   $table->integer('unique_id')->nullable();
            $table->integer('StationId')->nullable();
            $table->integer('month')->nullable();
            $table->integer('year')->nullable();
        
            $table->float('value')->default(0);
            $table->float('value_2')->default(0);
            $table->float('value_3')->default(0);
            $table->float('unit')->default(0);
            $table->float('unit_2')->default(0);
            $table->float('unit_3')->default(0);
            $table->float('total_col')->default(0);
            $table->float('total_col_2')->default(0);
        
            $table->float('total_col_3')->default(0);
     
           $table->float('max_2')->default(0);
            $table->float('min_2')->default(0);
 

      
           
            $table->float('prev')->default(0);
              
      
            $table->float('late')->default(0);            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
